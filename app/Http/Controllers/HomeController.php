<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AssesorPerProgram;
use App\Program;
use App\ScoreRecorded;
use App\StrategicObjectiveScore;
use App\QuaterActive;
use App\YearActive;
use App\KeyPerfomanceIndicatorScore;
class HomeController extends Controller
{
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
        // return $id;

        $loggedInemail = Auth::user()->email;
        $programids = AssesorPerProgram::where('email','=',$loggedInemail)->get();
        $countingid = count($programids);
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
                
                if ($id == 0) {
                    return view('adminPages.adminLanding');
                }
                $programs = Program::where('id','=',$id)->get();


                foreach($programs as $program){
                    $programName = $program->name;
                    $programShortHand = $program->shortHand;
                    $perspectives = $program->perspectives;
                    
                }
                
                return view('users.landingPage',['programId'=>$id,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
            }
        }
        else{
            return view('forbidden');
        }
        

        
    }
}
