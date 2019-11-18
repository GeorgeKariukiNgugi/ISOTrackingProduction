<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AssesorPerProgram;
use App\Program;
use App\ScoreRecorded;
use App\StrategicObjectiveScore;
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
        $scoresRecorded = StrategicObjectiveScore::all();

        //! GETTING THE QUATERS THAT WILL BE CHECKED DURING THE INSERTION OF DATA.

        $quaterOne = ScoreRecorded::where('quater','=','Q1')
                                    ->where('year','=','2019')
                                    ->get();
        $quaterTwo = ScoreRecorded::where('quater','=','Q2')
                                    ->where('year','=','2019')
                                    ->get();
        $quaterthree = ScoreRecorded::where('quater','=','Q3')
                                    ->where('year','=','2019')
                                    ->get();
        $quaterfour = ScoreRecorded::where('quater','=','Q4')
                                    ->where('year','=','2019')
                                    ->get();
        $id = "null";
        if($countingid == 1){
            foreach($programids as $programid){
                //!getting the program that the user should asses, and all its perspetives.
                $id = $programid->program_id;
                
                $programs = Program::where('id','=',$id)->get();
                foreach($programs as $program){
                    $programName = $program->name;
                    $programShortHand = $program->shortHand;
                    $perspectives = $program->perspectives;
                    
                }
                
                return view('users.landingPage',['perspectives'=>$perspectives,'scoresRecorded'=>$scoresRecorded,'programName'=>$programName,'programShortHand'=>$programShortHand,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour]);
            }
        }
        else{
            return view('forbidden');
        }
        

        
    }
}
