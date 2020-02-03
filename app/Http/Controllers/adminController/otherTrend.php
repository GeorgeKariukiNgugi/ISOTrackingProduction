<?php

namespace App\Http\Controllers\adminController;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Charts\DashBoardCharts;
use App\StrategicObjective;
use App\QuaterActive;
use App\YearActive;
use App\NonConformities;
use App\Perspective;
// use App\Program;
use App\KeyPerfomaceIndicator;
use App\ScoreRecorded;
use App\KeyPerfomanceIndicatorScore;
use App\StrategicObjectiveScore;
use App\closedNonConformityEvidence;

class otherTrend extends Controller
{
    //
    public function otherTrends(){                     
        //! this section of the code is used to get the contrinution to the overall perspectives that each proram has made.

        $programs = Program::all();

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

        $activeYaerCollections = YearActive::where('Active','=',1)->get();
        foreach($activeYaerCollections as $activeYaerCollection){
            $activeYaer = $activeYaerCollection->Year;
            
        }
        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
            foreach($activeQuaterCollections as $activeQuaterCollection){
                $activeQuater = $activeQuaterCollection->Quater;
                
        }

            $quater = $activeQuater;
            $dougnutNames = array();
            $average = array();
            $scoresInPercentages = array();
            $scoresInPercentagesNames = array();
           for ($i=1; $i <=4 ; $i++) { 
               # code...
            $name = 'perspectiveDoughnut'.$i;
            // dd($name);   
            $name = new DashBoardCharts;
            $name->minimalist(true);
            // $name->height(550);
            
            $quaterScoresPerProgramArray = array();
            $newquaterScoresPerProgramArray = array();
            $arrayProgramNames = array();
            
               foreach ($programs as $program) {
                   # code...
                   $key = true;
                   $proramPersspectives = Perspective::where('program_id','=',$program->id)
                                                        ->where('perspective_group','=',$i)
                                                        ->get(); 
                   $finalScore = 0;
                   $track = 0;
                   if (count($proramPersspectives) == 0) {
                    # code...
                    $key = false;
                } else {

                    foreach ($proramPersspectives as $proramPersspective) {
                        # code...
                        $strategicObjectivesSum = 0;
                        $strateicObjectiveAverage = 0;
                        $track++;
                        $gettingStrategicObjectivesOfRelatedPerspective = StrategicObjectiveScore::where('perspective_id','=',$proramPersspective->id)
                                                                                                   ->where('year','=',$activeYaer)
                                                                                                   ->where('quater','=',$quater)
                                                                                                   ->get();            


                        if (count($gettingStrategicObjectivesOfRelatedPerspective) == 0) {
                            # code...
                            $strateicObjectiveAverage +=1;
                        } else {
                            # code...
                            foreach ($gettingStrategicObjectivesOfRelatedPerspective as $strategicObjective) {
                                # code...
                                $strategicObjectivesSum  += $strategicObjective->score;
                            }
                            $strateicObjectiveAverage= $strategicObjectivesSum/ count($gettingStrategicObjectivesOfRelatedPerspective);
                        }
                        $weight = $proramPersspective->weight;
                        $finalScore += $strateicObjectiveAverage;
                        // ($strateicObjectiveAverage*$weight)/100;

                    }
                }
                if ($key == true) {
                    # code...
                    array_push($quaterScoresPerProgramArray,$finalScore);
                    array_push($arrayProgramNames,$program->shortHand);

                }

               }
               switch ($i) {
                case 1:
                    # code...
                    $nameOfDoughnutChart = 'Financial Perspetive CONTRIBUTION DOUHNUT CHART.';
                    break;
                    case 2:
                        $nameOfDoughnutChart = 'Customer Perspetive CONTRIBUTION DOUHNUT CHART.';
                    break;
                    case 3: 
                        $nameOfDoughnutChart = 'Inernel Business Perspective CONTRIBUTION DOUHNUT CHART.';
                    break;
                    case 4:  
                        $nameOfDoughnutChart = 'Learning And Growth Perspetive CONTRIBUTION DOUHNUT CHART.';
                    break;

                default:
                    # code...
                    $nameOfDoughnutChart = 'Not Known';
                    break;
            }

                //! this section of the code is used to get the percentaes that the particular programs have contributed to the aggragate 
                //! perfomance of the perspectives. 

                    $varNumberOfRecordsInArray = count($quaterScoresPerProgramArray);
                    
                    $aggragate = 0;
                    for ($k=0; $k <$varNumberOfRecordsInArray ; $k++) { 
                        # code...
                        $aggragate +=  $quaterScoresPerProgramArray[$k];
                    }
                    
                    array_push($average,$aggragate/$varNumberOfRecordsInArray);

                    for ($k=0; $k <$varNumberOfRecordsInArray ; $k++) { 
                        # code...
                         array_push($newquaterScoresPerProgramArray,(( $quaterScoresPerProgramArray[$k])/$aggragate)*100); 
                    }

               //!maiking the datasets. 
               $name->dataset($nameOfDoughnutChart,'doughnut',$newquaterScoresPerProgramArray)->color("white")
                                                                                           ->backgroundcolor($borderColors);
               $name->displaylegend(true);
               $name->labels($arrayProgramNames);
               array_push($dougnutNames,$name);
               array_push($scoresInPercentages,$newquaterScoresPerProgramArray);
               array_push($scoresInPercentagesNames,$arrayProgramNames);
           }
        return view('adminPage.trends.otherTrends',['programs'=>$programs,'scoresInPercentagesNames'=>$scoresInPercentagesNames,'scoresInPercentages'=>$scoresInPercentages,'dougnutNames'=>$dougnutNames,'average'=>$average,'year'=>$activeYaer,'quater'=>$activeQuater]);
    }
}
