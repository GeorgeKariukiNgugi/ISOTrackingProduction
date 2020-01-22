<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\AssesorPerProgram;
use App\Program;
use App\ScoreRecorded;
use App\StrategicObjectiveScore;
use App\QuaterActive;
use App\YearActive;
use App\Perspective;
use App\NonConformities;
use App\StrategicObjective;
use App\KeyPerfomanceIndicatorScore;
use App\Userediting;
use  App\Charts\DashBoardCharts;
class HomeController extends Controller
{

    public function logOut(){
        // Auth::logout();
        return redirect('/');
        //return "loging out.";
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        // $userId =  Auth::user()->id;
    //    return Auth::user()->email;
        // return $userId;
    }

    public function trial(){
        return view('sample');
    }

    public function programRedirect(){
        // return $array;
        return $array;
        $loggedInemail = Auth::user()->email;
        $programids = AssesorPerProgram::where('email','=',$loggedInemail)->get();
        $countingid = count($programids);
        // dd($countingid);
        $keyPerfomanceIndicatorsScores = KeyPerfomanceIndicatorScore::all();

        //! GETTING WHICH QUATER AND TEAR IS ACTIVE.

        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;
            // dd($activeYaer);
        }

        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
        foreach($activeQuaterCollections as $activeQuaterCollection){
            $activeQuater = $activeQuaterCollection->Quater;
            // dd($activeQuater);
        }
        
        //!GETTING THE SCORES PER QUATER.
        $quaterOne = ScoreRecorded::where('quater','=','Q1')
                                    ->where('year','=',$activeYaer)
                                    ->get();
        $quaterTwo = ScoreRecorded::where('quater','=','Q2')
                                    ->where('year','=',$activeYaer)
                                    ->get();
        $quaterthree = ScoreRecorded::where('quater','=','Q3')
                                    ->where('year','=',$activeYaer)
                                    ->get();
        $quaterfour = ScoreRecorded::where('quater','=','Q4')
                                    ->where('year','=',$activeYaer)
                                    ->get();

        $id = "null";
        if($countingid == 1){
            foreach($programids as $programid){
                //!getting the program that the user should asses, and all its perspetives.
                $id = $programid->program_id;

                //! getting to see if the user that is logged into the system is the admin.
                if ($id == 0) {
                    //! getting all the programs.
                    $programs = Program::all();

                    //! establishing the arrays that will hold the scores and also the shorthand of the programs.
                    $programScores = array();
                    $programShorthand = array();
                    $programColors = array();
                    $programIds = array();
                    
                    //! THIS NEXT SECTION IS USED TO GET THE TOTAL SCORE OF THE PROGRAMS.
                    foreach ($programs as $program) {
                        $programValue = 0;
                        
                        array_push($programShorthand,$program->shortHand);
                        array_push($programColors,$program->colorCode);
                        array_push($programIds,$program->id);
                        $perspectives = Perspective::where('program_id','=',$program->id)->get();
                        // dd($perspectives);
                        
                        
                        foreach($perspectives as $perspective){
                            $perspectiveSumValue = 0;
                            $particularPerspectiveValue =0;
                            $perspectiveWeight = $perspective->weight;
                            $scores = StrategicObjectiveScore::where('perspective_id','=',$perspective->id)->get();
                            
                            if(count($scores) == 0){
                                $perspectiveValue = 0;
                            }
                            else{
                                $scoresNumber = count($scores);
                                // dd($scoresNumber);
                                foreach ($scores as $score) {
                                    # code...
                                    $perspectiveSumValue += $score->score;
                                }                                
                                $perspectiveAvgValue = $perspectiveSumValue / $scoresNumber;
                                $perspectiveValue = ($perspectiveAvgValue*$perspectiveWeight)/100;
                                // dd($perspectiveValue);
                                
                            }
                            
                            $programValue += $perspectiveValue;
                        }
                        
                        // dd($programValue);
                        array_push($programScores,$programValue);
                    }

                    //!GETTING THE DATA THAT WILL BE USED TO GET THE NONCONFORMITIES.
                    $closedNonConformities = NonConformities::where('openClosed','=','closed')->get();
                    $numberClosedNCs = count($closedNonConformities);

                    $openNonConformities = NonConformities::where('openClosed','=','open')->get();
                    $todaysdate = date('Y-m-d H:i:s');
                    $inProgressNCs = array();
                    $overdueNCs = array();
                    foreach($openNonConformities as $openNonConformity){
                        $openDate = $openNonConformity->date;
                        $openDateInDateFormat = date($openDate);
                        if($todaysdate > $openDateInDateFormat){
                            array_push($overdueNCs,$openNonConformity->date);
                        }
                        else{
                            array_push($inProgressNCs,$openNonConformity->date);
                        }
                    }

                    $numberoverDueNCs = count($overdueNCs);
                    $numberinProgressNCs = count($inProgressNCs);

                    $ncsArray = [$numberClosedNCs,$numberinProgressNCs,$numberoverDueNCs];
                    //! creating the chart that will have the 3 types of ncs.

                    $ncsCharts = new DashBoardCharts;
                    $ncsCharts->minimalist(true);
                    $ncsCharts->displaylegend(true);
                    $ncsCharts->labels(['Closed NCs', 'NCs In Progress','Overdue NCs']);
                    $fillColor = [
                        'green',
                        'orange',
                        'red'
                    ];
                    $ncsCharts->dataset('FINAL SCORE TO THE CATEGORY.', 'doughnut', [$numberClosedNCs, $numberinProgressNCs,$numberoverDueNCs])->color("white")
                                                                                                        ->backgroundcolor($fillColor);

                    //? this section of the code is used to get the number of nonConformities that's based on the programs.
                    
                    //! initialising the array that will hold all the specifics of the ncs.
                    $numberOfNcsArrays = array();
                    $ncsShortHand = array();
                    $ncsColor = array();
                     $gettingDistinctValues= NonConformities::
                                            distinct()
                                            ->get(['program_id']);

                     foreach ($gettingDistinctValues as $gettingDistinctValue) {
                         # code...
                         $gettingProgramName = Program::where('id','=',$gettingDistinctValue->program_id)->get();

                         foreach($gettingProgramName as $name){
                            $programShortHand = $name->shortHand;
                            $programColor = $name->colorCode;

                            //! pushing the data to the arrays.
                            array_push($ncsShortHand, $programShortHand."  NCs");
                            array_push($ncsColor, $programColor);
                         }
                         //!getting the number of open non conformities based o the particular group.
                         $gettingNcs = NonConformities::where('program_id','=',$gettingDistinctValue->program_id)
                                        ->where('openClosed','=','open')    
                                        ->get();
                        $numberOfNCs = count($gettingNcs);                
                         array_push($numberOfNcsArrays,$numberOfNCs);
                     }

                     //!creating the doughnut chart instance.
                     $ncsperProgramCharts = new DashBoardCharts;
                     $ncsperProgramCharts->minimalist(true);
                     $ncsperProgramCharts->displaylegend(true);
                     $ncsperProgramCharts->labels($ncsShortHand);
                     $fillColor = $ncsColor;
                    $ncsperProgramCharts->dataset('Open Non Confrmities Per Program', 'doughnut', $numberOfNcsArrays)->color("white")
                                                                                                        ->backgroundcolor($fillColor);
                    
                    //? GETTING TO SEE IF THE ASESERS HAVE ASSESED ALL THE KPIS IN THEIR PROGRAM IN A TABULAR FORMAT.
                    $checkingIfAssesed = array();
                    foreach ($programs as $program) {
                        
                        $numberOfKpis  = 0;
                        $numberOfKpisScored  = 0;
                        $perspectives = Perspective::where('program_id','=',$program->id)->get();
                        
                        foreach($perspectives as $perspective){
                            
                            $strategicObjectives = StrategicObjective::where('perspective_id','=',$perspective->id)->get();
                            
                            foreach ($strategicObjectives as $strategicObjective) {
                                # code...
                                $gettingTheKpiScores = KeyPerfomanceIndicatorScore::where('strategic_objective_id','=',$strategicObjective->id)
                                                                                    ->where('year','=',$activeYaer)
                                                                                    ->get();
                                $numberOfKpis += count($strategicObjective->keyPerfomaceIndicators);

                                //! this section of the code is used to get the number of cores of the kpi that are added to the scores recorded table. 
                                    // foreach($strategicObjective as $objective){
                                        //!getting the kpis that relate to the spectific  strategic objective.
                                        $kpis = $strategicObjective->keyPerfomaceIndicators;
                                        foreach ($kpis as $kpi) {
                                            # code...
                                            $scoresRecorded = ScoreRecorded::where('keyPerfomanceIndicator_id','=', $kpi->id)
                                                                            ->where('year','=',$activeYaer)
                                                                            ->where('quater','=',$activeQuater)
                                                                            ->get();
                                            $numberOfKpisScored += count($scoresRecorded);
                                        }

                                        // dd($numberOfKpisScored.'  '.$numberOfKpis);
                                    // }
                                // $numberOfKpisScored += count($strategicObjective->keyPerfomanceIndicatorScores);
                                
                            }
                            // $checkingIfAssesed
                        }

                        $value = $numberOfKpis - $numberOfKpisScored;
                        // dd($numberOfKpis.' '.$numberOfKpisScored);
                        // dd($value);
                        if($value == 0){
                            array_push($checkingIfAssesed, 0);
                            array_push($checkingIfAssesed, $program->shortHand);
                            
                         }
                         elseif ($value  == $numberOfKpis) {
                             # code...
                             array_push($checkingIfAssesed, -1);
                             array_push($checkingIfAssesed, $program->shortHand);
                         }
                         else{
                            array_push($checkingIfAssesed,$numberOfKpis-$numberOfKpisScored);
                            array_push($checkingIfAssesed, $program->shortHand);
                         }
                         
                    }
                    // dd($checkingIfAssesed);
                    // activity()->log('Logged In As Admin   '.Auth::user()->email);
                            // Auth::user()->email;

                    return view('adminPage.adminLanding',['programs'=>$programs,'programIds'=>$programIds,'checkingIfAssesed'=>$checkingIfAssesed,'ncsperProgramCharts'=>$ncsperProgramCharts,'ncsArray'=>$ncsArray,'ncsCharts'=>$ncsCharts,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'programScores'=>$programScores,'programShorthand'=>$programShorthand,'programColors'=>$programColors]);
                }
                $programs = Program::where('id','=',$id)->get();


                foreach($programs as $program){
                    $programName = $program->name;
                    $programShortHand = $program->shortHand;
                    $perspectives = $program->perspectives;
                    
                }
                //! getting wherther the activation of the editing has happened. 
                $gettingUserEditings = Userediting::all();
                $valueOfEditing = 0;
                foreach($gettingUserEditings as $gettingUserEditing){

                    $valueOfEditing = $gettingUserEditing->value;
                }
                return view('user.landingPage',['valueOfEditing'=>$valueOfEditing,'programId'=>$id,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
            }
        }
        else{
            // dd("users");
            // activity()->log('User Tried To Log In   '.Auth::user()->email);
            return view('forbidden');
        }
        

        
    }
}
