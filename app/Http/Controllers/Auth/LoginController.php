<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\AssesorPerProgram;
// use Illuminate\Http\Request;
// use Auth;
use DB;
// use App\AssesorPerProgram;
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
use Session;
// use Route;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    //! MODIYFING THE LOGIN FUNCTIONALITY TO REDIRECT THE USERS BASED ON THEIR EMAIL SPECIFICATION.

    protected function redirectTo($id){
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
                                       $perspectiveAvgValue =0;
                                       array_push($programShorthand,$program->shortHand);
                                       array_push($programColors,$program->colorCode);
                                       array_push($programIds,$program->id);
                                       $perspectives = Perspective::where('program_id','=',$program->id)->get();
                                       // dd($perspectives);
                                       
                                       
                                       foreach($perspectives as $perspective){
                                           $perspectiveSumValue = 0;
                                           $particularPerspectiveValue =0;
                                           $perspectiveWeight = $perspective->weight;
                                        //    $strategicObjectives = StrategicObjective::where('perspective_id','=',$perspective->id)->get();

                                           $scores = StrategicObjectiveScore::where('perspective_id','=',$perspective->id)
                                                                                ->where('year','=',$activeYaer)
                                                                                ->where('quater','=',$activeQuater)    
                                                                                ->get();
                                           
                                           if(count($scores) == 0){
                                               $perspectiveAvgValue = 0;
                                           }
                                           else{
                                               $scoresNumber = count($scores);
                                               // dd($scoresNumber);
                                              
                                               foreach ($scores as $score) {                                                  
                                                   $perspectiveSumValue += $score->score;

                                               }                                
                                               $perspectiveAvgValue = $perspectiveSumValue;                                          
                                               
                                           }
                                           
                                        //    $programValue += $perspectiveValue;
                                       }
                                       
                                       // dd($programValue);
                                       array_push($programScores,$perspectiveAvgValue);                    
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
                                           }
                                       }
               
                                       $value = $numberOfKpis - $numberOfKpisScored;
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
                                   return view('adminPage.adminLanding',['programs'=>$programs,'ncsCharts'=>$ncsCharts,'ncsperProgramCharts'=>$ncsperProgramCharts,'activeYaer'=>$activeYaer,'programScores'=>$programScores,'programColors'=>$programColors,'programShorthand'=>$programShorthand,'programIds'=>$programIds,'activeQuater'=>$activeQuater,'checkingIfAssesed'=>$checkingIfAssesed,'ncsArray'=>$ncsArray]);
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
                               //! this section is used to send the non-conformities that have been identified by the application. 
                                $nonConformities =  NonConformities::all();
                               return view('user.landingPage',['nonConformities'=>$nonConformities,'valueOfEditing'=>$valueOfEditing,'programId'=>$id,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
                           }                
    public function logInUsingLDAP(Request $request){        
        header('Content-type: application/json');
        $_JSON = json_decode(file_get_contents('php://input'), true);
        $username = str_replace('@safaricom.co.ke', '', strip_tags($request->email));
        $password = strip_tags($request->password);
        $ldap_svr = "172.28.229.103";
        $ldap_port = "389";
        $ldapuser = $username."@safaricom.net";
        $uname = "SAFARICOM\\".$username;
        $dn = "ou=safaricom departments,dc=safaricom,dc=net";
        $pieces = explode("\\", $uname);
        $uname1 = $pieces[1];
        $ds = ldap_connect($ldap_svr, $ldap_port);
    
        if ($ds)
        {
            ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
            $ldapbind = @ldap_bind($ds, $ldapuser, $password);
    
            if ($ldapbind)
            {
                $filter = "(sAMAccountName=" . $username . ")";
                $attr = array("memberof", "givenname", "mail", "cn", "sn", "samaccountname");
                $result = ldap_search($ds, $dn, $filter, $attr) or exit("Unable to search LDAP server");
                $entries = ldap_get_entries($ds, $result);
                $givenname = $entries[0]['givenname'][0];
    
                $i = 0;
                $res = [
                    'fullname' => $entries[0]["cn"][0],
                    'givenname' => $entries[0]["givenname"][0],
                    'surname' => $entries[0]["sn"][0],
                    'username' => strtolower($entries[0]["samaccountname"][0]),
                    'email' => $entries[0]["mail"][0]
                ];                               
                ldap_close($ds);                
                Session::put('name', $res['fullname'] );
                Session::put('email', $res['email'] );

                // echo $loggedInemail;
                //! add the data to redirect a user. 
                $programids = AssesorPerProgram::where('email','=',Session::get('email'))->get();
                $countingid = count($programids);
                $id = "null";
                if($countingid == 1){
                    foreach($programids as $programid){
                        //!getting the program that the user should asses, and all its perspetives.
                        $id = $programid->program_id;
                        
                    }
                    return $this->redirectTo($id);
                }
                else if($countingid > 1){                 
                 //    return "You Have more Than One Accounts to update.";
                 //! this is the array that is used to hold the array of short hands. 
                 $programShortHand = array();
                 $programId = array();
                 foreach ($programids as $programid) {
                     # code...
                     if($programid->program_id == 0){
                         array_push($programShortHand,'Admin');
                         array_push($programId,$programid->program_id);
                     }
                     else{
                         $programWithIds = Program::where('id','=',$programid->program_id)
                         ->get();

                         foreach($programWithIds as $programWithId){
                             array_push($programShortHand,$programWithId->shortHand);
                             array_push($programId,$programid->program_id);
                         }
                     }
                 }                        
                 return view('userWithMoreThanOneProgram',['programShortHand'=>$programShortHand,'programId'=>$programId]);
                }
                else{
                 return view('forbidden');
                }      
                

            }
            else
            {
                http_response_code(401); 
                # Unauthorized
                return back()->withErrors(["The Credentials Don't Match Our Records"]);
                echo "Invalid credentials. Please try again.";
            }
        }
        else
        {
            http_response_code(503); # Service unavailable
            //echo "Unable to connect to LDAP server";
        }
    
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
