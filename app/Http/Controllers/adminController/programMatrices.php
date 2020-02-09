<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use App\Http\Requests\editingKpis;
use App\Http\Requests\editingStrategicObjective;
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
use App\KeyPerfomaceIndicator;
use App\Http\Requests\AddingNewStrstegicObjective;
use RealRashid\SweetAlert\Facades\Alert;
use  App\Charts\DashBoardCharts;
use App\Userediting;
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
          $URLstring = url()->current();
          $admin = 'programMatrices';
          $programManager = 'userMatrices';
          if(strpos($URLstring,$admin) !== false){
            return view('adminPage.programMatrices',['activeQuater'=>$activeQuater,'programId'=>$id,'programName'=>$programName,'programs'=>$programs,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
          }

          if (strpos($URLstring,$programManager) !== false) {
              # code...
              $gettingUserEditings = Userediting::all();
              $valueOfEditing = 0;
              foreach($gettingUserEditings as $gettingUserEditing){

                  $valueOfEditing = $gettingUserEditing->value;
              }
              return  view('user.matrices.programMatrices',['activeQuater'=>$activeQuater,'id'=>$id,'valueOfEditing'=>$valueOfEditing,'programId'=>$id,'programName'=>$programName,'programs'=>$programs,'quaterOne'=>$quaterOne,'quaterTwo'=>$quaterTwo,'quaterthree'=>$quaterthree,'quaterfour'=>$quaterfour,'perspectives'=>$perspectives,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'keyPerfomanceIndicatorsScores'=>$keyPerfomanceIndicatorsScores,'programName'=>$programName,'programShortHand'=>$programShortHand]);
          }
   
        
    }

    public function addStrategicObjective(AddingNewStrstegicObjective $request, $id){
        $data = ($request->newObjWeight)+0;        
        $short = substr($request->strName,0,20);
        $newStrstegicObjective = new StrategicObjective;
        $newStrstegicObjective->weight = $data+0;
        $newStrstegicObjective->perspective_id= $id;
        $newStrstegicObjective->name=$request->strName;
        $newStrstegicObjective->shortHand= $short;
        $newStrstegicObjective->save();

                   //! this section of the code will be used to get the editing of the strategic objective weights. 
                   $numberOfStrategicObjectives = $request->strategicObjectiveForAdditionNumber;                    
                      $str = array();
                      $values = array();
                   $perspectiveId = $request->perspectiveIdForAddition;                 
                   for ($i=1; $i <= $numberOfStrategicObjectives ; $i++) { 

                    $nameOfWeight = 'WeightstrategicObjectiveForAddition'.$id.$i;
                    $nameOfStrategicObjectiveId = 'strategicObjectiveIdForAddition'.$id.$i;                                        
                    $strategicObjectivesChangeInWeights = StrategicObjective::where('id','=',$request->$nameOfStrategicObjectiveId)->get();
                    
                    foreach($strategicObjectivesChangeInWeights as $strategicObjectivesChangeInWeight){
                        $strategicObjectivesChangeInWeight->weight = $request->$nameOfWeight;
                        $strategicObjectivesChangeInWeight->save();
                        array_push($values,$request->$nameOfWeight);
                    }

                   }
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'New Strategic Objective Has Been Added.');
        return back();

    }

    public function EditingKpis(editingKpis $request, $id){
        $kpiToBeUpdated = KeyPerfomaceIndicator::where('id','=',$id)->get();

        foreach($kpiToBeUpdated as $kpi){
            $kpi->name  =$request->name;
            $kpi->period  =$request->period;
            $kpi->arithmeticStructure  =$request->arithmeticStructure;
            $kpi->target  =$request->target;
            $kpi->units = $request->units;
            $kpi->save();
        }
        
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>','Succesfully Updated.');
        return back();

    }

    //! this controller method is used to delete the particular KPIs. 

    public function deleteKPI($kpiId){
            
        $kpiIds = KeyPerfomaceIndicator::where('id','=',$kpiId)->get();
        $kpiScores = KeyPerfomanceIndicatorScore::where('kpi_id','=',$kpiId)->get();

        foreach ($kpiScores as $kpiScore) {
            # code...
            $kpiScore->delete();
        }

        foreach($kpiIds as $kpiId){
            $kpiId->delete();
        }
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>','KPI Successfully Deleted..');
        return back();
    }

    //! this method id used to delete the strategic objective of a perspective.
    public function deleteStrategicObjective($strObjectiveId){

    $strategicObjectives = StrategicObjective::where('id','=',$strObjectiveId)->get(); 
    foreach ($strategicObjectives as $strategicObjective) {
        # code...
        //! getting the kpis related to the strategicObjective.
        $kpis = $strategicObjective->keyPerfomaceIndicators;
        $kpiScores = $strategicObjective->keyPerfomanceIndicatorScores;
        //! delete strategic Objective Scores. 
        

        foreach($kpis as $kpi){
            $kpi->delete();
        }
        foreach ($kpiScores as $kpiScore) {
            # code...
            $kpiScore->delete();
        }
        $strategicObjective->delete();
    } 
    
         $strategicObjectiveScores = StrategicObjectiveScore::where('strategicObjective_id','=',$strObjectiveId)->get();
        foreach ($strategicObjectiveScores as $strategicObjectiveScore) {
            # code...
            $strategicObjectiveScore->delete();
        }
    
    Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>','Strayegic Objective Successfully Deleted..');
        return back();
    }

    //! this method id used to edit a particular strategic Objective.
    public function editStrategicObjective(editingStrategicObjective $request, $strategicObjectiveId){

        $newName = $request->name;
           //!getting strategic objective.
           $strategicObjectives = StrategicObjective::where('id','=',$strategicObjectiveId)->get();

           foreach ($strategicObjectives as $strategicObjective) {
               # code...
               $strategicObjective->name = $newName;
               $strategicObjective->save();
           }

           //! this section of the code will be used to get the editing of the strategic objective weights. 
           $numberOfStrategicObjectives = $request->numberOfStrategicObjectives;
        
           $str = array();
           $values = array();
        for ($i=1; $i <= $numberOfStrategicObjectives ; $i++) { 
            # code...
            $newStrategicObjectiveId = "strategicObjectiveId".$i;
            $newStrategicObjectiveId = $request->$newStrategicObjectiveId;
            $strategicObjectiveWeightInputField = "strategicObjectiveWeight".$i;
            $strategicObjectiveWeight = $request->$strategicObjectiveWeightInputField;

            array_push($str,$newStrategicObjectiveId );
            array_push($values, $strategicObjectiveWeight);
            

            $strategicObjectivesChangeInWeight = StrategicObjective::where('id','=',$newStrategicObjectiveId)->get();

            foreach ($strategicObjectivesChangeInWeight as $strategicObjectivesChange) {
                # code...
                $strategicObjectivesChange->weight = $strategicObjectiveWeight;
                $strategicObjectivesChange->save();
            }
        }

            
           Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>','Strategic Objective Successfully Edited.');
           return back();
    }


    //! this section of the code is used to delete the selected perspective. 

    public function deletePerspectives(Request $request){ 

        //! the number of perspetives that have been submitted. 
        $numberOfPerspectives = $request->numberOfPerspecives;
        //! the perspective id of the program that has been clicked. 
        $deletingPerspeciveId = $request->deletingId;
        //! program id.
        $programId = $request->hiddenProgramId;

        $sum = 0;
        for ($i=1; $i <= $numberOfPerspectives ; $i++) { 
            # code...
            $requestName = 'perspective'.$programId .$i;
            $sum+= $request->$requestName;
        }
         
        if ($sum != 100) {
            # code...
            //! return the user back to the screen because he escaped the javascript validation.

        } else {
            # code...
            //!  in this section of the code, we udpate the perpetives with the correct data after re-assesment. 

            for ($j=1; $j <= $numberOfPerspectives ; $j++) { 
                # code...
                //! getting the perspective id. 
                $perspectiveRequestName = 'hiddenPerspectiveId'.$j;
                $perspectiveId = $request->$perspectiveRequestName;
                $requestNameOfPerspective = 'perspective'.$programId .$j;
                //! selecting the data from the database that concerns the perspective. 

                $perspectiveSelected = Perspective::where('id','=',$perspectiveId)
                                                    ->where('program_id','=',$programId)
                                                    ->get();
                foreach($perspectiveSelected as $perspective){

                    $perspective->weight = $request->$requestNameOfPerspective;
                    $perspective->save();
                }

            }

            //! this section is to delete the selected perspectives. 
            $idOfDeletingId = $request->deletingId;
            $deletingPerspectiveSelected = Perspective::where('id','=',$idOfDeletingId)
                                                        ->get();
            foreach ($deletingPerspectiveSelected as $deletingPerspective) {
                # code...
                $deletingPerspective->delete();
            }
            $Message = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
            "The perspective selected, has successfully been deleted, kindly refresh your browser to get the latest updates.
                </strong><br /></span></div>";
            
            return response()->json(['success'=>$Message]);

        }                
    }

    //! this controller method is used to edit the name of the perspectve. 
    public function editingPerspectiveName(Request $request){
        
        //? getting the name that wil be changed.
        $perspectiveIdToEdit =$request->perspectiveIdToEdit;
        $perspectiveName = $request->nameOfPerspecrive;

        $editingPerspectiveNames = Perspective::where('id','=',$perspectiveIdToEdit)->get();

        
        foreach($editingPerspectiveNames as $editingPerspectiveName){
            $editingPerspectiveName->name = $perspectiveName;
            $editingPerspectiveName->save();
        }

        //? getting the perspective id. 
        $perspectiveId = $request->perspectiveIdToEdit;

        //? getting the number of perspectives that should be edited. 
        $numberOfPerspectivesToBeEdited = $request->numberOfPerspectivesEdited;
        $incrementalNumberEdit = $request->numberOfPerspectivesEdited;
        
        for ($i=1; $i <= $incrementalNumberEdit; $i++) { 
            # code...
            //? gettin the hidden value that holds the perspective id. 
            $hiddenPerspeciveId = 'hiddenPerspectiveWeight'.$i;
            $hiddenPerspeciveId = $request->$hiddenPerspeciveId;
            
            //? getting the perspective input value 
            $perspectiveInputValue = 'editingWeight'.$i;
            $perspectiveInputValue = $request->$perspectiveInputValue;

            $perspectives = Perspective::where('id','=',$hiddenPerspeciveId)->get();
            foreach($perspectives as $perspective){

                $perspective->weight = $perspectiveInputValue;
                $perspective->save();
            }
        }

       Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'Perspectives Edited Successfully.');
       return back();

    }
    public function addingNewPerspetive(Request $request){

        $perspectiveName = $request->newPerspectiveWeightname;
        $perspectiveWeight = $request->newPerspectiveWeight;
        $programId = $request->proramId;
        $perspectiveType = $request->perspectiveType;
        $lastGroup = 0;
        if($perspectiveType == 0){
            $takingLatPerspectives = Perspective::where('id','>',0)
                                              ->orderBy('id','asc')
                                              ->limit(1)
                                              ->get();
            foreach ($takingLatPerspectives as $takingLatPerspective) {
                # code...
                $lastGroup = $takingLatPerspective->perspective_group;
            }
        }

        $newProgram = new Perspective(
            array(
                'name'=>$perspectiveName,
                'weight'=>$perspectiveWeight,
                'program_id'=>$programId,  
                'perspective_group'=>$lastGroup,         
            )
        );        
        $newProgram->save();



        //? getting the number of perspectives that should be edited.         
        $incrementalNumberEdit = $request->numberOfPerspectives;
        
        for ($i=1; $i <= $incrementalNumberEdit; $i++) { 
            # code...
            //? gettin the hidden value that holds the perspective id. 
            $hiddenPerspeciveId = 'perspectiveId'.$i;
            $hiddenPerspeciveId = $request->$hiddenPerspeciveId;
            
            //? getting the perspective input value 
            $perspectiveInputValue = 'addingNewPerspectives'.$i;
            $perspectiveInputValue = $request->$perspectiveInputValue;
            
            $perspectives = Perspective::where('id','=',$hiddenPerspeciveId)->get();
            foreach($perspectives as $perspective){

                $perspective->weight = $perspectiveInputValue;
                $perspective->save();
            }
        }

        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'Added Perspective Successfully.');
        return back();
    }
}
