<?php

namespace app\Http\Controllers\userController;

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
use App\Userediting;
use App\KeyPerfomanceIndicatorScore;
use App\StrategicObjectiveScore;
use App\closedNonConformityEvidence;
use Auth;
//!DASHBOARD CLASS.
use App\Http\Requests\submittingClosingNonConfromity;
use  App\Charts\DashBoardCharts;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    public function submittingKPIScores($quater,Request $request){        

        dd($quater);
        //! getting the active year and active quater from the database.
        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;
            // dd($activeYaer);
        }

        // $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
        // foreach($activeQuaterCollections as $activeQuaterCollection){
        //     $activeQuater = $activeQuaterCollection->Quater;
        //     // dd($activeQuater);
        // }
        $activeQuater =  $quater;
        // $activeYaer = $request->activeQuaterForSubmision;
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
            $gettingNonConformities = NonConformities::where('keyPerfomanceIndicator_id','=',$idOfKPI)
                                                        ->where('quater','=',$activeQuater)
                                                        ->where('year','=',$activeYaer)
                                                        ->get();
            $numberOfReturnedNonConformities = count($gettingNonConformities);
            
            //!checking if the flag value is positive or negative.
            if ($formFlagInputValue == 1) {                
                if($numberOfReturnedNonConformities == 0){
                    // dd($numberOfReturnedNonConformities . "The kpiId =  ".$idOfKPI. " Active Quater =  ".$activeQuater. "The Year is " .$activeYaer);
                    $errorMessage = '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "SCORES NOT SUBMITTED. Kindly Add The Non conformity reasons for the kpi   ".$kpi->name.
                        "</strong><br /></span></div>";
                    // return response()->json(['success'=>' SCORES NOT SUBMITTED. Kindly Add The Non conformity reasons for the kpi  '.$kpi->name]);
                    return response()->json(['success'=>$errorMessage]);

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
            else if ($formFlagInputValue == 2){
                //!if the flag is neither positive or negative, that is, its null, just update the score.
                $prefixOfTheActiveQuater = substr($activeQuater,1);
                $scoreInputName = "Quater".$prefixOfTheActiveQuater.$idOfKPI;
                // dd($scoreInputName);
                $score = $request->$scoreInputName;
                $gettingTheScoreRecordedCollection = ScoreRecorded::where('keyPerfomanceIndicator_id','=',$idOfKPI)
                                                                    ->where('quater','=',$activeQuater)
                                                                    ->where('year','=',$activeYaer)
                                                                    ->get();
                $countingTheScoreRecorded = count($gettingTheScoreRecordedCollection);
                if ($countingTheScoreRecorded >= 1) {
                    foreach($gettingTheScoreRecordedCollection as $scoreRecord){
                        $scoreRecord->score= $score;
                        $scoreRecord->save();
                    }
                    // return response()->json(['success'=>'Data Has Been Updated. '.$kpi->name]);
                }
            }
            //! if no reasonable reason is found, then we can now insert the data into the scoresrecorded table. 
            $prefixOfTheActiveQuater = substr($activeQuater,1);
            $scoreInputName = "Quater".$prefixOfTheActiveQuater.$idOfKPI;
            $score = $request->$scoreInputName;
            
            //! CHECKING IF THERE IS THE SAME RECORD IS FOUND IN THE DATABASE SO AS TO AVOID DUPLICATION OF DATA.
            $gettingTheScoreRecordedCollection = ScoreRecorded::where('keyPerfomanceIndicator_id','=',$idOfKPI)
                                                                ->where('quater','=',$activeQuater)
                                                                ->where('year','=',$activeYaer)
                                                                ->get();
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
                    // activity()->log('Scores Recorded By   '.Auth::user()->email);                              
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
                // activity()->log('Scores Recorded By   '.Auth::user()->email); 
            }
            
            //? THE FOLLOWING STEP IS FOR ADDING THE DATA TO THE KEY PERFOMANCE INDICATORS SCORES TABLE.
            //! selecting all the records from the scores recorded with a particular kpiId and also the same year. 
            $allKPIScoresWithSameYear = ScoreRecorded::where('year','=',$activeYaer)
                                                     ->where('quater','=',$activeQuater)
                                                     ->where('keyPerfomanceIndicator_id','=',$idOfKPI)
                                                     ->get();

            //!counting the number of records returned. 

            // dd(count($allKPIScoresWithSameYear));
            $numberOfReturnedScores = count($allKPIScoresWithSameYear);
            if($numberOfReturnedScores<1){
                $errorMessage = '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "There is an error incalculating the ytds, contact the Admin For Help.".
                        "</strong><br /></span></div>";
                // return response()->json(['success'=>'There is an error incalculating the ytds, contact the Admin For Help.']);
                return response()->json(['success'=>$errorMessage]);
            }
            $averageThatBecomesytd = 0;
            //!getting the period of the kpi that is being asses.
            $period = $kpi->period;
            
            if($period == 2){

                if($prefixOfTheActiveQuater == 1){
                    $averageThatBecomesytd = 100;
                }
                elseif($prefixOfTheActiveQuater == 3){
                    $findingQ2Value = ScoreRecorded::where('year','=',$activeYaer)
                    ->where('keyPerfomanceIndicator_id','=',$idOfKPI)
                    ->where('quater','=','Q2')
                    ->get();

                    foreach($findingQ2Value as $Value){
                        $averageThatBecomesytd = $Value->score;
                    }
                }
                elseif($prefixOfTheActiveQuater == 2){
                    $averageThatBecomesytd = $score;
                }
                else{
                    $findingQ2Value = ScoreRecorded::where('year','=',$activeYaer)
                    ->where('keyPerfomanceIndicator_id','=',$idOfKPI)
                    ->where('quater','=','Q2')
                    ->get();

                    foreach($findingQ2Value as $Value){
                        $scoreFetched = $Value->score;
                    }
                    $averageThatBecomesytd = ($score+$scoreFetched)/2;
                }
            }
            elseif($period == 1){

                if ($prefixOfTheActiveQuater == 4) {
                    # code...
                    $averageThatBecomesytd = $score;
                } else {
                    # code...
                    $averageThatBecomesytd = 100;
                }
            }
            else{
                $sum = 0;
                foreach($allKPIScoresWithSameYear as $kpiScoreInSameYear){
                    $sum+=$kpiScoreInSameYear->score;
                }
            $averageThatBecomesytd = $sum/$numberOfReturnedScores;
            }
            // dd($averageThatBecomesytd);
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
                            if ($kpiTarget == 0) {
                                # code...
                                $kpiTarget= 1;
                            }
                            $kpiScore = ($averageThatBecomesytd/$kpiTarget)*100;
                        }
                        
                    break;
                    case '2':
                            # code...
                            //* isms, do later.
                            if ($averageThatBecomesytd <= 1) {
                                # code...
                                $kpiScore = 100;
                            } else  if ($averageThatBecomesytd <= 2){
                                $kpiScore = 80;
                            }
                            else  if ($averageThatBecomesytd <= 3){
                                $kpiScore = 70;
                            }
                            else  if ($averageThatBecomesytd <= 4){
                                $kpiScore = 66;
                            }
                            else  if ($averageThatBecomesytd <= 5){
                                $kpiScore = 33;
                            }
                            else{
                                $kpiScore = 0;
                            }
                    break;
                    case '3':
                                # code...
                                //* isms, do later.
                                if ($averageThatBecomesytd <= 1) {
                                    # code...
                                    $kpiScore = 100;
                                } else  if ($averageThatBecomesytd <= 2){
                                    $kpiScore = 80;
                                }
                                else  if ($averageThatBecomesytd <= 3){
                                    $kpiScore = 70;
                                }
                                else  if ($averageThatBecomesytd <= 4){
                                    $kpiScore = 66;
                                }
                                else  if ($averageThatBecomesytd <= 5){
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
                        if ($averageThatBecomesytd == 0 OR $averageThatBecomesytd == 1) {
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
                            // $kpiScore = 0;
                            $kpiScore = 100- (($averageThatBecomesytd-1)*100);
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
            $kpiscoresRecords = KeyPerfomanceIndicatorScore::where('kpi_id','=',$idOfKPI)
                                                            ->where('year','=',$activeYaer)
                                                            ->where('quater','=',$activeQuater)                                                            
                                                            ->get();
                                    
            //!counting the records.
            $numberOfKPIRecords = count($kpiscoresRecords);
            // dd($numberOfKPIRecords);
            if($numberOfKPIRecords>0){
                //!since there is a record in the DB, update the record.
                // dd($activeQuater);
                foreach($kpiscoresRecords as $kpiscoresRecord){
                    $kpiscoresRecord->year =$activeYaer;
                    $kpiscoresRecord->ytd =$averageThatBecomesytd;
                    $kpiscoresRecord->kpi_id =$idOfKPI;
                    $kpiscoresRecord->quater =$activeQuater;
                    $kpiscoresRecord->strategic_objective_id =$strategicObjectiveIdFromForm;
                    $kpiscoresRecord->score = $kpiScore; 
                    $kpiscoresRecord->save();
                    // activity()->log('KPI Scores Recorded By   '.Auth::user()->email.'  for  '.$programShortHand); 
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
                        'quater'=> $activeQuater,
                    )                    
                );
                
                $savingKPIcore->save();
                //  ()->log('KPI Scores Recorded By   '.Auth::user()->email.'  for  '.$programShortHand); 
                // dd($kpiScore);
                // return response()->json(['success'=>''.$strategicObjectiveIdFromForm.'saved successsfully, Move to the Next Objective']);
            }

        }   
        //? Inserting Data to the strategic objectives scores table. 
        //! to insert the data, we first have to get the strategicObjectives from form. 
        // dd($strategicObjectiveIdFromForm);
        $gettingTheKPIScores = KeyPerfomanceIndicatorScore::where('strategic_objective_id','=',$strategicObjectiveIdFromForm)
                                                            ->where('year','=',$activeYaer)
                                                            ->where('quater','=',$activeQuater)
                                                            ->get();
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
            $gettingStrategicObjectiveRecord = StrategicObjectiveScore::where('strategicObjective_id','=',$strategicObjectiveIdFromForm)
                                                                        ->where('year','=',$activeYaer)
                                                                        ->where('quater','=',$activeQuater)
                                                                        ->get();
            $countingTheNUmberOfReturnedStrategicObjective = count($gettingStrategicObjectiveRecord);

            //!getting the strategic objective and the perspective id for the given kpi.
            $gettingStrategicObjetive = StrategicObjective::where('id','=',$strategicObjectiveIdFromForm)->get();

            foreach($gettingStrategicObjetive as $StrategicObjetive){
                $perspectiveIddrawn = $StrategicObjetive->perspective_id;
                $strategicObjectiveWeight = $StrategicObjetive->weight;
            }

            if($countingTheNUmberOfReturnedStrategicObjective >=1){
                foreach($gettingStrategicObjectiveRecord as $StrategicObjectiveRecord){
                    //! IN THIS SECTION OF THE CODE, WE ARE EQUATING THE VALUE THAT IS THE AVERAGE TO THE STRATEGIC OBJEVTIVE WEIGHT.
                    $average = (($average/100)*$strategicObjectiveWeight);
                    $StrategicObjectiveRecord->strategicObjective_id= $strategicObjectiveIdFromForm;
                    $StrategicObjectiveRecord->perspective_id= $perspectiveIddrawn;
                    $StrategicObjectiveRecord->score= $average ;
                    $StrategicObjectiveRecord->year = $activeYaer;
                    $StrategicObjectiveRecord->quater = $activeQuater;
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
                                                'quater'=>$activeQuater,
                                            )
                );
                $savingTheStrateicObjective->save();
            }
            $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>    '.
            $activeQuater."    Data has been saved successsfully, Move to the Next Objective".
                        "</strong><br /></span></div>";
        // return response()->json(['success'=>'Data has been saved successsfully, Move to the Next Objective'.$kpiNumber]);
        return response()->json(['success'=>$errorMessage]);
    }


    //? THE FUNCTION THAT IS USED TO INSERT THE NON CONFORMITIES INTO THE TABLE.

    public function submittingNonConformities($quater, Request $request){

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
 
        //  $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
        //  foreach($activeQuaterCollections as $activeQuaterCollection){
        //      $activeQuater = $activeQuaterCollection->Quater;
        //      // dd($activeQuater);
        //  }
        // dd( $quater);
        $activeQuater = $quater;
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

         $gettingTheNonConformityWithGivenKPIid = NonConformities::where('keyPerfomanceIndicator_id','=',$nonConformitykpiId)
                                                                  ->where('quater','=',$activeQuater)                                                      
                                                                 ->get();
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
                    $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "Root Cause, Correction and corrective actions successfully saved. Close PopUp To Continue.'".
                        "</strong><br /></span></div>";
                    // return response()->json(['success'=>'Root Cause, Correction and corrective actions successfully saved. Close PopUp To Continue.']);
                    return response()->json(['success'=>$errorMessage]);
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

                $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "'Root Cause, Correction and corrective actions successfully UPDATED. Close PopUp To Continue.".
                        "</strong><br /></span></div>";

                // return response()->json(['success'=>'Root Cause, Correction and corrective actions successfully UPDATED. Close PopUp To Continue.']);
                return response()->json(['success'=>$errorMessage]);
             }
         }
         else{
            $errorMessage = '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
            "Non conformity details cannot be accessed at this time. Kindly Contact Admin.".
                "</strong><br /></span></div>";
            // return response()->json(['success'=>'Non conformity details cannot be accessed at this time. Kindly Contact Admin.']);
            return response()->json(['success'=>$errorMessage]);
         }        
    }

    //! This is the function that is used to store the the new kpis. 

    public function submittingNewKPIs(Request $request){
        dd("cow");
        $newKPIPerspective = $request->perpective;
        $newStrategicObjective = $request->strategicObjective;        
        $newKPIName = $request->kpiName;
        $newJPITarget = $request->kpiTarget;
        $newKPIPeriod = $request->period;
        $newKPIArithmeticStructure = $request->arithmeticStructure;
        $savingKPI = new KeyPerfomaceIndicator(
                        array(
                            'name'=>$newKPIName,
                            'strategic_objective_id'=>$newStrategicObjective,                            
                            'perspective_id'=>$newKPIPerspective,
                            'arithmeticStructure'=>$newKPIArithmeticStructure,
                            'target'=>$newJPITarget,
                            'period'=>$newKPIPeriod,
                            'units'=>'%'
                        )
        );
        
        $savingKPI->save();
        $responseArray = array();
        $errorMessage = '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>'.
                    "New KPI  '".$savingKPI->name ."'   Has Been Added".
                        "</strong><br /></span></div>";

        //! this section is used to get the active quater and then activate the correct quater.
        $activeQuaters = QuaterActive::where('Active','=',1)->get();  
        
        foreach ($activeQuaters as $activeQuater) {

            $quater = $activeQuater->Quater;
            # code...
        }
        
        array_push($responseArray,$errorMessage);                        
        array_push($responseArray,$savingKPI->id);
        array_push($responseArray,$savingKPI->name);               
        array_push($responseArray,$savingKPI->arithmeticStructure);
        array_push($responseArray,$savingKPI->target);
        array_push($responseArray,$savingKPI->period);
        array_push($responseArray,$quater);
        
        return response()->json(['success'=>$responseArray]);
    }
 //! TTHIS IS THE CONTROLLER THAT IS USED TO HANDLE ALL THE DASHBOARD GRAPH GENERATION.
 
 public function DashboardConroller($id){
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
    //!THIS FIRST SECTION IS USED TO DEFINE THE ARRAY THAT WILL HOLD THE COLLECTION OF THE BAR CHARTS THATHAVE BEEN DEPLOYED. 
    $charts = array();
    // $proramPersspectives = StrategicObjective::where('perspective_id','=',$id)->get();
    $proramPersspectives = Perspective::where('program_id','=',$id)->get();
        
    //!definig the two arrays that will be used to store the names and also the values.
    
    foreach ($proramPersspectives as $proramPersspective) {
        $chartNames = array();
        $chartValues = array();
        $gettingThePerspectiveId = $proramPersspective->id;
        $perspectiveObjectiveName = $proramPersspective->name;

        $perspectiveStrategicObjectiveNames = StrategicObjective::where('perspective_id','=',$gettingThePerspectiveId)                                                                                                                               
                                                                ->get();
        //!thi section is used to get the strategic objective name.
        foreach ($perspectiveStrategicObjectiveNames as $perspectiveStrategicObjectiveName) {
            # code...
            array_push($chartNames,$perspectiveStrategicObjectiveName->shortHand);
            
            $perspectiveStrategicObjectives = StrategicObjectiveScore::where('perspective_id','=',$gettingThePerspectiveId)
                                                                      ->where('year','=',$activeYaer)
                                                                      ->where('quater','=',$activeQuater)
                                                                      ->where('strategicObjective_id','=',$perspectiveStrategicObjectiveName->id)
                                                                      ->get();                                                                    
            //!this section is used to get the scores of the particular strateegic objective.
            //!counting the number of records returned from the scores table. 
            if(count($perspectiveStrategicObjectives) == 0){
                array_push($chartValues,0);
            }
            else{
                $number = count($perspectiveStrategicObjectives);
                $total = 0;
                $average = 0;
                foreach ($perspectiveStrategicObjectives as $perspectiveStrategicObjective) {
                    # code...
                    $total += $perspectiveStrategicObjective->score;
                   
                }
                $weight = $perspectiveStrategicObjectiveName->weight;
                // dd($weight);
                $average = $total/$number;
                // dd($number);
                if ($weight == 0) {
                    # code...
                    // $weight = 1;
                } 
                
                $average = ($average/$weight)*100;
                array_push($chartValues,$average);
            }
        }
        // dd($chartValues);
        //Definig the chart instance that will hold the chart items.
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        
        $chartName = "chart".$perspectiveObjectiveName;
        $chartName = new DashBoardCharts;
        $chartName->minimalist(true);
        $chartName->displayaxes(true);
        // $chartName->displaylegend(true);
        $chartName->labels($chartNames);
        $chartName->dataset($perspectiveObjectiveName, 'bar', $chartValues)
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        //!PUSHING THE CHART TO THE ARRAY THAT CONTAINS ALL THE CHARTS.

        array_push($charts, $chartName);
    }

    //!THIS NEXT SECTION IS USED TO GET THE TOTAL SCORE OF THE PROGRAM.
    $finalScore = 0;
    foreach ($proramPersspectives as $proramPersspective) {
        $strategicObjectivesSum = 0;
        $strateicObjectiveAverage = 0;
        //!the next step is to get the strateic objectives of the reated perspective. 
        $gettingStrategicObjectivesOfRelatedPerspective = StrategicObjectiveScore::where('perspective_id','=',$proramPersspective->id)
                                                                                 ->where('year','=',$activeYaer)
                                                                                 ->where('quater','=',$activeQuater)
                                                                                 ->get();
        if (count($gettingStrategicObjectivesOfRelatedPerspective) == 0) {
            # code...
            $strateicObjectiveAverage =0;
        } else {
            # code...
            foreach ($gettingStrategicObjectivesOfRelatedPerspective as $strategicObjective) {
                # code...
                $strategicObjectivesSum  += $strategicObjective->score;
            }
            // $strateicObjectiveAverage= $strategicObjectivesSum/count($gettingStrategicObjectivesOfRelatedPerspective);
        }
        
        
        //!the next step is to get its equivalent score in telation to its weight.

        // $weight = $proramPersspective->weight;
        // $finalScore += ($strateicObjectiveAverage*$weight)/100;
        $finalScore += $strategicObjectivesSum;
        
    }

    $remainingValue = 100-$finalScore;
    //! creating the pie chart that will give a visual representation of everything.
    $chart = new DashBoardCharts;
    $chart->minimalist(true);
    $chart->labels(['Pass', 'Fail']);
    // $chart->displaylegend(true);
    $fillColor = [
        '#00A65A',
        '#D73925'
    ];
    $chart->dataset('FINAL SCORE TO THE CATEGORY.', 'doughnut', [$finalScore, $remainingValue])->color("white")
                                                                                        ->backgroundcolor($fillColor);

    //! This section of code gives a vivid description of what kpis have not been assesed, a small pie chart iss to be included.
    
    //? STEPS: GETTING THE WHOLE LIST.

    $programId = $id;
    $allPerctivesForTheProgram = Perspective::where('program_id','=',$programId)->get();
    
    $allKPIsRetrieved = array();
    foreach ($allPerctivesForTheProgram as $allPerctives) {
        // $allKPIsRetrieved = array();
        $kpisRetrieved = $allPerctives->keyPerfomaceIndicators;
        foreach($kpisRetrieved as $kpi){
            array_push($allKPIsRetrieved,$kpi->id);
        }
    }
    // dd($allKPIsRetrieved);
    //! The next Step is to get the missing ids that are not in the list. 
    $kpisNotScored = array();
    $kpisScored = array();
    $kpiNotScoredNames = array();
    for ($i=0; $i < count($allKPIsRetrieved); $i++) { 
        # code...
        // $dbSearch = KeyPerfomanceIndicatorScore::where('kpi_id','=',$allKPIsRetrieved[$i])->get();
        $dbSearch = ScoreRecorded::where('keyPerfomanceIndicator_id','=',$allKPIsRetrieved[$i])
                                 ->where('quater','=',$activeQuater)
                                 ->where('year','=',$activeYaer)
                                 ->get();
        // dd(count($dbSearch));
        if(count($dbSearch) == 0){
            array_push($kpisNotScored,$allKPIsRetrieved[$i]);
            // dd("null");
            $gettingNamesKpiNotScored = KeyPerfomaceIndicator::where('id','=',$allKPIsRetrieved[$i])->get();
            foreach ($gettingNamesKpiNotScored as $kpiNames) {
                $name = $kpiNames->name;
                $removingUnserScores = str_replace('_', ' ', $name);                
                $ucName = ucwords($removingUnserScores);
                $nameInserted = substr($ucName,0,55);
                $addingElipses = $nameInserted.' ...';
                array_push($kpiNotScoredNames,$addingElipses);
            }
        }
        else{
            array_push($kpisScored,$allKPIsRetrieved[$i]);
            // dd("present");
        }
    }
    // dd($kpiNotScoredNames);

    //!getting the program name and also the program code of the active program that is being assesed.

    $proramDetails = Program::where('id','=',$id)->get();
    $programDetailsArray = array();
    foreach($proramDetails as $proramDetail){
        array_push($programDetailsArray,$proramDetail->name);
        array_push($programDetailsArray,$proramDetail->programCode);
        array_push($programDetailsArray,$proramDetail->shortHand);
    }

    $gettingUserEditings = Userediting::all();
    $valueOfEditing = 0;
    foreach($gettingUserEditings as $gettingUserEditing){

        $valueOfEditing = $gettingUserEditing->value;
    }
    
    return view('user.dashboard',['valueOfEditing'=>$valueOfEditing,'programDetailsArray'=>$programDetailsArray,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'chart'=>$chart,'kpiNotScoredNames'=>$kpiNotScoredNames,'allKpis'=>$allKPIsRetrieved,'finalScore'=>$finalScore,'id'=>$id,'charts'=>$charts,'proramPersspectives'=>$proramPersspectives ]);
 }

 public function nonConformities($id, $closed){
// ! In this section we area going to fetch all the momconformities that have both been closed and are not overdue.
    $activeYaerCollections = YearActive::where('Active','=',1)->get();
    foreach($activeYaerCollections as $activeYaerCollection){
        $activeYaer = $activeYaerCollection->Year;        
    }

    $todaysdate = date('Y-m-d H:i:s');

    //!getting the prgram Name . 
    $programNames = Program::where('id','=',$id)->get();
    $proramenameValue = '';
    foreach($programNames as $programName){
        $proramenameValue = $programName->name;
    }

    if ($closed == 1) {
        # code...        
        //! this isthe section that will look for the nonconformities thatare out of date.
        $nonConformities = NonConformities::where('openClosed', '=', 'open')
                                            ->whereDate('date', '<=',$todaysdate)
                                            // ->where('year','=',$activeYaer)
                                            ->where('program_id','=',$id)
                                            ->orderBy('date', 'asc')
                                            ->get();

        // dd("Overdue  ".count( $nonConformities ));  
        $gettingUserEditings = Userediting::all();
              $valueOfEditing = 0;
              foreach($gettingUserEditings as $gettingUserEditing){

                  $valueOfEditing = $gettingUserEditing->value;
              }
        return view('user.nonConformities',['valueOfEditing'=>$valueOfEditing,'status'=> 'open','nonConformities'=>$nonConformities,'id'=>$id,'state'=>$closed,'programmeName'=>$proramenameValue]);

    } else if ($closed == 0){
        $nonConformities = NonConformities::where('openClosed', '=', 'open')
                                            ->whereDate('date', '>=',$todaysdate)
                                            // ->where('year','=',$activeYaer)
                                            ->where('program_id','=',$id)
                                            ->orderBy('date', 'asc')
                                            ->get();
              
              $gettingUserEditings = Userediting::all();
              $valueOfEditing = 0;
              foreach($gettingUserEditings as $gettingUserEditing){

                  $valueOfEditing = $gettingUserEditing->value;
              }
        return view('user.nonConformities',['valueOfEditing'=>$valueOfEditing,'status'=> 'open','nonConformities'=>$nonConformities,'id'=>$id,'state'=>$closed,'programmeName'=>$proramenameValue]);  

    }
    else if ($closed == 2){
        $nonConformities = NonConformities::where('openClosed', '=', 'closed')       
        ->where('year','=',$activeYaer)
        ->where('program_id','=',$id)
        ->orderBy('date', 'asc')
        ->get();

              $gettingUserEditings = Userediting::all();
              $valueOfEditing = 0;
              foreach($gettingUserEditings as $gettingUserEditing){

                  $valueOfEditing = $gettingUserEditing->value;
              }

        //! getting the details that will be sent to the closed non conformities.
            $closedNonConformities = closedNonConformityEvidence::all(); 
                   
return view('user.nonConformities',['valueOfEditing'=>$valueOfEditing,'status'=> 'closed','closedNonConformities'=>$closedNonConformities,'nonConformities'=>$nonConformities,'id'=>$id,'state'=>$closed,'programmeName'=>$proramenameValue]);
    }     
 }


//!  THIS CONTROLLER METHOD WILL BE USED TO SUBMIT THE CLOSURE OF THE NON CONFORMITIES.

public function closingNonConformity(submittingClosingNonConfromity $request){
    
    //getting the names of the submitted data.
    // dd("checking.");
    //! checking if the file input has the data that is needed.

    try {
        //code...
        if ($request->hasFile('attachment')) {
        $fileFullName = $request->attachment->getClientOriginalName();         
        $fileNameWithoutExtension = pathinfo($request->attachment->getClientOriginalName(), PATHINFO_FILENAME);

        // !getting the file extension.
        $extension = substr($fileFullName, strlen($fileNameWithoutExtension));
        //!creating the new name of the file by adding the timestamp. 

        $newName = $fileNameWithoutExtension . time() .$extension; 

        //storing The evidence into the system.

        $request->attachment->storeAs('public/evidence', $newName);        
    } else {

        $newName = "N/A";

    }
        //! getting the values that will be inserted into the closure of non conformites table. 
        $nonConformity_id= $request->nonConformityId;
        $clossureDate = $request->closureDate;
        $briefDescription= $request->briefDescription;
        $locationOfEvidence= $newName;
        
        // dd($nonConformity_id);
        //! first changing the status of the nc to closed.
        $closedNCCollection = NonConformities::where('id','=',$nonConformity_id)->get();
    
        foreach ($closedNCCollection as $closedNC) {
            # code...
            $closedNC->openClosed = 'closed';
            $closedNC->save();
        }
    
    //! inserting the data into the non conformities table. 
    $closedNCEvidence = new closedNonConformityEvidence(
                                array(
                                        'clossureDate'=> $clossureDate,
                                        'briefDescription'=>$briefDescription,
                                        'locationOfEvidence'=>$locationOfEvidence,
                                        'nonConformity_id'=>$nonConformity_id
                                    )
    );
    $closedNCEvidence->save();
    
        Alert::success(' <h4 style = "color:green;">Congartulations    <i class="fa fa-thumbs-up"></i></h4>', 'The Non Conformity Has Successfully Been Closed.');
    
        return back();
    } catch (\Throwable $th) {
        //throw $th;
        return back()->with('msg', 'The Message');
    }
}

public function video($id,$type){
    $programs = Program::all();
    $gettingUserEditings = Userediting::all();
    $valueOfEditing = 0;
    foreach($gettingUserEditings as $gettingUserEditing){

        $valueOfEditing = $gettingUserEditing->value;
    }
    return view('user.video',['valueOfEditing'=>$valueOfEditing,'programs'=>$programs,'id'=>$id,'type'=>$type]);
}
}
