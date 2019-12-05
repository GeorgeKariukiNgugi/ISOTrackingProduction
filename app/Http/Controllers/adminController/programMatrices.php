<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
use App\Http\Requests\AddingNewStrstegicObjective;
use RealRashid\SweetAlert\Facades\Alert;
use  App\Charts\DashBoardCharts;
class programMatrices extends Controller
{
    public function proramMatrices($id){
        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        $keyPerfomanceIndicatorsScores = KeyPerfomanceIndicatorScore::all();
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
                                    $programs = Program::where('id','=',$id)->get();


                                    foreach($programs as $program){
                                        $programName = $program->name;
                                        $programShortHand = $program->shortHand;
                                        $perspectives = $program->perspectives;
                                        
                                    }
          $programs = Program::all();                          
                                    
    return view('adminPages\programMatrices',['programId'=>$id,'programs'=>$programs,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
        
    }

    public function addStrategicObjective( AddingNewStrstegicObjective $request, $id){
        $newStrstegicObjective = new StrategicObjective(
                        array(
                            'perspective_id'=> $id,
                            'name'=>$name =$request->strName,
                        )
        );
        $newStrstegicObjective->save();

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'New Strategic Objective Has Been Added.');
        return back();

    }
}
