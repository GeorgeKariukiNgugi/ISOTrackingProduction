<?php

namespace App\Http\Controllers\userControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StrategicObjective;
use App\QuaterActive;
use App\YearActive;
use App\NonConformities;
use App\Perspective;
use App\Program;
use App\KeyPerfomaceIndicator;
class userController extends Controller
{
    public function submittingKPIScores(Request $request){        

        //! getting the active year and active quater from the database.
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


        $strategicObjectiveIdFromForm = $request->strategicObjective;

        $strategicObjectivesKpis = StrategicObjective::where('id','=',$strategicObjectiveIdFromForm)->get();
        //!getting the key perfomance indicators of the strategic objectuve.
        foreach($strategicObjectivesKpis as $strategicObjectivesKpi){
            $kpis = $strategicObjectivesKpi->keyPerfomaceIndicators;
            $kpiNumber = count($kpis);
        }
        

        //!counting the key perfomance indicators.         

        // return response()->json(['success'=>'Data has been saved successsfully, Move to the Next Objective']);
    }


    //? THE FUNCTION THAT IS USED TO INSERT THE NON CONFORMITIES INTO THE TABLE.

    public function submittingNonConformities(Request $request){

        //!getting the returned values from the post request.
        $correctiveAction = $request->correctiveAction;
        $rootCause = $request->rootCause;         
        $date = $request->date;
        $permanentSolution = $request->permanentSolution;
        $nonConformitykpiId = $request->nonConformitykpiId; 

         //! getting the active year and active quater from the database.
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

         //!getting the strategic objective.

         $retrievingStrategicObjectiveIds = KeyPerfomaceIndicator::where('id','=',$nonConformitykpiId)->get();

         foreach($retrievingStrategicObjectiveIds as $retrievingStrategicObjectiveId){
            $strategicObjectiveId = $retrievingStrategicObjectiveId->strategic_objective_id;
            
         }

         //!getting the perspective id.

            $retrievingThePerspectives = StrategicObjective::where('id','=',$strategicObjectiveId)->get();

            foreach($retrievingThePerspectives as $retrievingThePerspective){
                $perspectiveId = $retrievingThePerspective->perspective_id;
                
            }

         //!getting the program_id.
            $retrievingTheProgramIds = Perspective::where('id','=',$perspectiveId)->get();

            foreach($retrievingTheProgramIds as $retrievingTheProgramId){
                $programId = $retrievingTheProgramId->program_id;
                // dd($programId);
            }

            //! GETTING TO SEE IF THE NON CONFORMITY HAS BEEN ADDED TO THE NONCONFORMITY TABLE. 
            //! IF SO, UPDATE THE RECORD, IF NOT,ADD THE DATA TO THE NON CONFORMITY TABLE.

         $gettingTheNonConformityWithGivenKPIid = NonConformities::where('keyPerfomanceIndicator_id','=',$nonConformitykpiId)->get();
         $countingReturnedNonConformities = count($gettingTheNonConformityWithGivenKPIid);
         if ($countingReturnedNonConformities == 0) {
             # code...
             $savingNonConformity = new NonConformities(
                array(
                    'year'=>$activeYaer,
                    'quater'=>$activeQuater,
                    'rootCause'=>$rootCause,
                    'openClosed'=> 'open',
                    'correction'=>$permanentSolution,
                    'correctiveAction'=>$correctiveAction,
                    'date'=>$date,
                    'keyPerfomanceIndicator_id'=>$nonConformitykpiId,
                    'strategicObjective_id'=>$strategicObjectiveId,
                    'perspective_id'=>$perspectiveId,
                    'program_id'=>$programId
                )
                    );
                    //! saving the nonconformity.
                    $savingNonConformity->save();

                    //  return "saved Data.";
                    return response()->json(['success'=>'Root Cause, Correction and corrective actions successfully saved. Close PopUp To Continue.']);
         } 
         else if ($countingReturnedNonConformities == 1){
             # code...
             foreach($gettingTheNonConformityWithGivenKPIid as $NonConformityWithGivenKPI){
                $NonConformityWithGivenKPI->year = $activeYaer;
                $NonConformityWithGivenKPI->quater =$activeQuater;
                $NonConformityWithGivenKPI->rootCause=$rootCause;
                $NonConformityWithGivenKPI->openClosed= 'open';
                $NonConformityWithGivenKPI->correction=$permanentSolution;
                $NonConformityWithGivenKPI->correctiveAction=$correctiveAction;
                $NonConformityWithGivenKPI->date=$date;
                $NonConformityWithGivenKPI->keyPerfomanceIndicator_id=$nonConformitykpiId;
                $NonConformityWithGivenKPI->strategicObjective_id=$strategicObjectiveId;
                $NonConformityWithGivenKPI->perspective_id=$perspectiveId;
                $NonConformityWithGivenKPI->program_id=$programId;
                $NonConformityWithGivenKPI->save();

                return response()->json(['success'=>'Root Cause, Correction and corrective actions successfully UPDATED. Close PopUp To Continue.']);
             }
         }
         else{
            return response()->json(['success'=>'Non conformity details cannot be accessed at this time. Kindly Contact Admin.']);
         }        
    }
}
