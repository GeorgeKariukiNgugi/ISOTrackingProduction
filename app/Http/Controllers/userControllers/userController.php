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
use App\ScoreRecorded;
use App\KeyPerfomanceIndicatorScore;
use App\StrategicObjectiveScore;
//!DASHBOARD CLASS.
use  App\Charts\DashBoardCharts;

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
                        
        //! looping through the kpis so as to check the value of the flag. 
        foreach($kpis as $kpi){
            $idOfKPI = $kpi->id;
            $formFlagInputName = "nonConformityFlag".$idOfKPI;
            $formFlagInputValue = $request->$formFlagInputName;

            //! GETTING ALL THE NON CONFORMITIES THAT HAVE BEEN RECORDED. 
            $gettingNonConformities = NonConformities::where('keyPerfomanceIndicator_id','=',$idOfKPI)->get();
            $numberOfReturnedNonConformities = count($gettingNonConformities);

            //!checking if the flag value is positive or negative.
            if ($formFlagInputValue == 1) {                
                if($numberOfReturnedNonConformities == 0){
                    return response()->json(['success'=>'Kindly Add The Non conformity reasons for the kpi  '.$kpi->name]);
                }                
            }
            else if($formFlagInputValue == 0){
                if($numberOfReturnedNonConformities == 1){
                    //! if the values are present, and the flag has been set to negtive, delete the record since
                    //! it is an update.
                    foreach($gettingNonConformities as $gettingNonConformity){
                        $gettingNonConformity->delete();
                    }
                }
            } 
            //! if no reasonable reason is found, then we can now insert the data into the scoresrecorded table. 
            $prefixOfTheActiveQuater = substr($activeQuater,1);
            $scoreInputName = "Quater".$prefixOfTheActiveQuater.$idOfKPI;
            $score = $request->$scoreInputName;
            
            //! CHECKING IF THERE IS THE SAME RECORD IS FOUND IN THE DATABASE SO AS TO AVOID DUPLICATION OF DATA.
            $gettingTheScoreRecordedCollection = ScoreRecorded::where('keyPerfomanceIndicator_id','=',$idOfKPI)->get();
            $countingTheScoreRecorded = count($gettingTheScoreRecordedCollection);
            if ($countingTheScoreRecorded >= 1) {
                //! data is in the DB, update the record.
                foreach($gettingTheScoreRecordedCollection as $scoreRecord){
                    $scoreRecord->keyPerfomanceIndicator_id=$idOfKPI;
                    $scoreRecord->score= $score;
                    $scoreRecord->quater = $activeQuater;
                    $scoreRecord->year = $activeYaer;
                    $scoreRecord->metOrUnmet = $formFlagInputValue;
                    $scoreRecord->reasonProvided = $formFlagInputValue;

                    //!saving the updates. 
                    $scoreRecord->save();
                }
                
            } else {
                //! data not in the database, insert a fresh record.
                $savingTheScoresRecorded = new ScoreRecorded(
                    array(
                        'keyPerfomanceIndicator_id'=>$idOfKPI,
                        'score'=>$score,
                        'quater'=>$activeQuater,
                        'year'=>$activeYaer,
                        'metOrUnmet'=>$formFlagInputValue,
                        'reasonProvided'=>$formFlagInputValue
                    )
                );
                $savingTheScoresRecorded->save();
            }
            
            //? THE FOLLOWING STEP IS FOR ADDING THE DATA TO THE KEY PERFOMANCE INDICATORS TABLE.
            //! selecting all the records from the scores recorded with a particular kpiId and also the same year. 
            $allKPIScoresWithSameYear = ScoreRecorded::where('year','=',$activeYaer)
                                                     ->where('keyPerfomanceIndicator_id','=',$idOfKPI)
                                                     ->get();

            //!counting the number of records returned. 
            $numberOfReturnedScores = count($allKPIScoresWithSameYear);
            if($numberOfReturnedScores<1){
                return response()->json(['success'=>'There is an error incalculating the ytds, contact the Admin For Help.']);
            }

            $sum = 0;
            $averageThatBecomesytd = 0;

            // for ($i=0; $i < $numberOfReturnedScores ; $i++) { 
            //     # code...-score
            //     $sum+=$allKPIScoresWithSameYear->score;
            // }
                foreach($allKPIScoresWithSameYear as $kpiScoreInSameYear){
                    $sum+=$kpiScoreInSameYear->score;
                }
            $averageThatBecomesytd = $sum/$numberOfReturnedScores;

            //!getting the score based on the ytd and the arithmetic structure.

            $atithmeticStructure = $kpi->arithmeticStructure;
            $kpiTarget = $kpi->target;
            $kpiScore = 0;
            switch ($atithmeticStructure) {
                    case '0':
                    # code...
                    if ($averageThatBecomesytd<=$kpiTarget) {
                        # code...
                        $kpiScore = 100;
                    } else {
                        # code...                        
                        if ($kpiTarget == 0) {
                            # code...
                            $kpiTarget = 1;
                        }
                        $percentage = $averageThatBecomesytd-$kpiTarget;
                        $kpiScore = ($percentage/$averageThatBecomesytd)*100; 

                    }
                    
                    break;
                    case '1':
                        # code...
                        if ($averageThatBecomesytd>$kpiTarget) {
                            # code...
                            $kpiScore = 100;
                        } else {
                            # code...
                            $kpiScore = ($averageThatBecomesytd/$kpiTarget)*100;
                        }
                        
                    break;
                    case '2':
                            # code...
                            //* isms, do later.
                            if ($averageThatBecomesytd == 1) {
                                # code...
                                $kpiScore = 100;
                            } else  if ($averageThatBecomesytd == 2){
                                $kpiScore = 80;
                            }
                            else  if ($averageThatBecomesytd == 3){
                                $kpiScore = 70;
                            }
                            else  if ($averageThatBecomesytd == 4){
                                $kpiScore = 66;
                            }
                            else  if ($averageThatBecomesytd == 5){
                                $kpiScore = 33;
                            }
                            else{
                                $kpiScore = 0;
                            }
                    break;
                    case '3':
                                # code...
                                //* isms, do later.
                                if ($averageThatBecomesytd == 1) {
                                    # code...
                                    $kpiScore = 100;
                                } else  if ($averageThatBecomesytd == 2){
                                    $kpiScore = 80;
                                }
                                else  if ($averageThatBecomesytd == 3){
                                    $kpiScore = 70;
                                }
                                else  if ($averageThatBecomesytd == 4){
                                    $kpiScore = 66;
                                }
                                else  if ($averageThatBecomesytd == 5){
                                    $kpiScore = 33;
                                }
                                else{
                                    $kpiScore = 0;
                                }
                    break;
                    case '4':
                        if ($averageThatBecomesytd == 1) {
                            # code...
                            $kpiScore = 100;
                        } else{
                            $kpiScore = 0;
                        }
                    break;
                    case '5':
                        if ($averageThatBecomesytd == 0) {
                            # code...
                            $kpiScore = 100;
                        } else{
                            $kpiScore = 0;
                        }          
                    break;
                    case '6':
                        if ($averageThatBecomesytd <= 1) {
                            # code...
                            $kpiScore = 100;
                        } else{
                            $kpiScore = 0;
                        } 
                    break;
                    case '7':
                        if ($averageThatBecomesytd <= 36) {
                            # code...
                            $kpiScore = 100;
                        } else{
                            $kpiScore  = ((($averageThatBecomesytd *100)/$kpiTarget) - 100);
                            
                        }
                    break;
                
                    default:
                        return "There is a problem with the implementation of the scores and ytd.";
                    break;
            }

            
            //! Adding the data into the kpi scores table, we first check if it is present, if so we update or else we insert. 
            $kpiscoresRecords = KeyPerfomanceIndicatorScore::where('kpi_id','=',$idOfKPI)->get();
            
            //!counting the records.
            $numberOfKPIRecords = count($kpiscoresRecords);
            // dd($numberOfKPIRecords);
            if($numberOfKPIRecords>0){
                //!since there is a record in the DB, update the record.
                foreach($kpiscoresRecords as $kpiscoresRecord){
                    $kpiscoresRecord->year =$activeYaer;
                    $kpiscoresRecord->ytd =$averageThatBecomesytd;
                    $kpiscoresRecord->kpi_id =$idOfKPI;
                    $kpiscoresRecord->strategic_objective_id =$strategicObjectiveIdFromForm;
                    $kpiscoresRecord->score = $kpiScore; 
                    $kpiscoresRecord->save();
                    // dd($strategicObjectiveIdFromForm);
                    // return response()->json(['success'=>''.$strategicObjectiveIdFromForm.'UPDATED successsfully, Move to the Next Objective']);                 
                }

            }

            else if($numberOfKPIRecords == 0){
                $savingKPIcore = new KeyPerfomanceIndicatorScore(
                    array(
                        'year' =>$activeYaer,
                        'ytd' =>$averageThatBecomesytd,
                        'kpi_id' =>$idOfKPI,
                        'strategic_objective_id' =>$strategicObjectiveIdFromForm,
                        'score' => $kpiScore,
                    )                    
                );
                
                $savingKPIcore->save();
                // dd("out of table.");
                // return response()->json(['success'=>''.$strategicObjectiveIdFromForm.'saved successsfully, Move to the Next Objective']);
            }

        }   
        //? Inserting Data to the strategic objectives scores table. 
        //! to insert the data, we first have to get the strategicObjectives from form. 
        // dd($strategicObjectiveIdFromForm);
        $gettingTheKPIScores = KeyPerfomanceIndicatorScore::where('strategic_objective_id','=',$strategicObjectiveIdFromForm)->get();
        $countingNoOfKPIScores = count($gettingTheKPIScores);
        // dd($countingNoOfKPIScores);
        $sum = 0;
        $average = 0;
        foreach($gettingTheKPIScores as $gettingTheKPIScore){
            $value = $gettingTheKPIScore->score;
            $sum = $sum+$value;
        }
        $average = $sum/$countingNoOfKPIScores;
        // dd($average);

        //! checking if the data has has a value so as to see if the value has a duplicate so as to update.
            $gettingStrategicObjectiveRecord = StrategicObjectiveScore::where('strategicObjective_id','=',$strategicObjectiveIdFromForm)->get();
            $countingTheNUmberOfReturnedStrategicObjective = count($gettingStrategicObjectiveRecord);

            //!getting the strategic objective and the perspective id for the given kpi.
            $gettingStrategicObjetive = StrategicObjective::where('id','=',$strategicObjectiveIdFromForm)->get();

            foreach($gettingStrategicObjetive as $StrategicObjetive){
                $perspectiveIddrawn = $StrategicObjetive->perspective_id;
            }

            if($countingTheNUmberOfReturnedStrategicObjective >=1){
                foreach($gettingStrategicObjectiveRecord as $StrategicObjectiveRecord){

                    $StrategicObjectiveRecord->strategicObjective_id= $strategicObjectiveIdFromForm;
                    $StrategicObjectiveRecord->perspective_id= $perspectiveIddrawn;
                    $StrategicObjectiveRecord->score= $average ;
                    $StrategicObjectiveRecord->year = $activeYaer;

                    //! saving the changes.
                    $StrategicObjectiveRecord->save();

                }
            }
            else{

                $savingTheStrateicObjective = new StrategicObjectiveScore(
                                            array(
                                                'strategicObjective_id'=>$strategicObjectiveIdFromForm,
                                                'perspective_id'=> $perspectiveIddrawn,
                                                'score'=> $average,
                                                'year'=>$activeYaer,
                                            )
                );
                $savingTheStrateicObjective->save();
            }

        return response()->json(['success'=>'Data has been saved successsfully, Move to the Next Objective'.$kpiNumber]);
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

    //! This is the function that is used to store the the new kpis. 

    public function submittingNewKPIs(Request $request){
        
        $newKPIPerspective = $request->perpective;
        $newStrategicObjective = $request->strategicObjective;        
        $newKPIName = $request->kpiName;
        $newJPITarget = $request->kpiTarget;
        $newKPIArithmeticStructure = $request->arithmeticStructure;
        $savingKPI = new KeyPerfomaceIndicator(
                        array(
                            'name'=>$newKPIName,
                            'strategic_objective_id'=>$newStrategicObjective,                            
                            'perspective_id'=>$newKPIPerspective,
                            'arithmeticStructure'=>$newKPIArithmeticStructure,
                            'target'=>$newJPITarget,
                        )
        );
        // dd($newStrategicObjective);
        $savingKPI->save();
        return response()->json(['success'=>'New KPI Added. Close PopUp To Continue.']);
    }
 //! TTHIS IS THE CONTROLLER THAT IS USED TO HANDLE ALL THE DASHBOARD GRAPH GENERATION.   
}