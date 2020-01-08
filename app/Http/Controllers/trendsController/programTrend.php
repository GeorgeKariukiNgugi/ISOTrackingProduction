<?php

namespace App\Http\Controllers\trendsController;

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

class programTrend extends Controller
{

    public function programTrends($id){

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
            // dd($activeYaer);
        }
        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
            foreach($activeQuaterCollections as $activeQuaterCollection){
                $activeQuater = $activeQuaterCollection->Quater;
                // dd($activeQuater);
        }

        $quaterSubStr = substr($activeQuater,1); 
        $quaterSubStr = $quaterSubStr+0;

        $programs = Program::all();
        $programz = Program::where('id','=',$id)->get();


        $groupedLineGraph = new DashBoardCharts;
        $groupedLineGraph->minimalist(false);
        $groupedLineGraph->height(500);

        $groupedBarChartForProgramProgressQuaterly = new DashBoardCharts;
        $groupedBarChartForProgramProgressQuaterly->minimalist(false);
        $groupedBarChartForProgramProgressQuaterly->height(500);

        $colorCode = 0;
        foreach($programz as $program){
            $programName = $program->name;
            $colorCode++;
            $quaterScoresPerProgramArray = array();
            $quaterScoresPerProgramArrayLineGraph = [0];
        for ($i=1; $i <= $quaterSubStr ; $i++) { 

            $quater = 'Q'.$i;
            $proramPersspectives = Perspective::where('program_id','=',$program->id)->get();                
            $finalScore = 0;
            $track = 0;
    foreach ($proramPersspectives as $proramPersspective) {
        $strategicObjectivesSum = 0;
        $strateicObjectiveAverage = 0;
        $track++;
        //!the next step is to get the strateic objectives of the reated perspective. 
        $gettingStrategicObjectivesOfRelatedPerspective = StrategicObjectiveScore::where('perspective_id','=',$proramPersspective->id)->where('year','=',$activeYaer)->where('quater','=',$quater)->get();            
        if (count($gettingStrategicObjectivesOfRelatedPerspective) == 0) {
            # code...
            $strateicObjectiveAverage =1;
        } else {
            # code...
            foreach ($gettingStrategicObjectivesOfRelatedPerspective as $strategicObjective) {
                # code...
                $strategicObjectivesSum  += $strategicObjective->score;
            }
            $strateicObjectiveAverage= $strategicObjectivesSum/ count($gettingStrategicObjectivesOfRelatedPerspective);
        }
        
        
        //!the next step is to get its equivalent score in telation to its weight.

        $weight = $proramPersspective->weight;
        $finalScore += ($strateicObjectiveAverage*$weight)/100;                

        }  
        array_push($quaterScoresPerProgramArray,$finalScore);
        array_push($quaterScoresPerProgramArrayLineGraph,$finalScore);
        
        
    }  
    $groupedBarChartForProgramProgressQuaterly->dataset( $program->shortHand,'bar', $quaterScoresPerProgramArray)
    ->color($borderColors[$colorCode])
    ->backgroundcolor($fillColors[$colorCode]);

    $groupedLineGraph->dataset($program->shortHand, 'line', $quaterScoresPerProgramArrayLineGraph)->fill(false)->color($program->colorCode);

    }
    $quaterNames = array();
    $quaterNamesForLineGraph = ['Start Of  '.$activeYaer];
    for ($i=1; $i <= $quaterSubStr ; $i++) { 
        array_push($quaterNames, $activeYaer. '   Q'.$i);
        array_push($quaterNamesForLineGraph, $activeYaer. '   Q'.$i);
    }

    $groupedBarChartForProgramProgressQuaterly->labels($quaterNames); 
    $groupedLineGraph->labels($quaterNamesForLineGraph);

    $URLstring = url()->current();
    $admin = 'admin';
    $programManager = 'programManager';
    if(strpos($URLstring,$admin) !== false){
        return view('adminPage.trends.particularProgramTrends',['programName'=>$programName,'programs'=>$programs,'year'=>$activeYaer,'groupedLineGraph'=>$groupedLineGraph,'groupedBarChartForProgramProgressQuaterly'=>$groupedBarChartForProgramProgressQuaterly]);
    }

    if (strpos($URLstring,$programManager) !== false) {
        # code...
        // dd('I Am A Program Manager.');
        return view('user.trends.particularProgramTrends',['programName'=>$programName,'programs'=>$programs,'year'=>$activeYaer,'id'=>$id,'groupedLineGraph'=>$groupedLineGraph,'groupedBarChartForProgramProgressQuaterly'=>$groupedBarChartForProgramProgressQuaterly]);
    }
    }

    public function perspectiveTrends($id){
// dd($id);
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
            // dd($activeYaer);
        }
        $activeQuaterCollections = QuaterActive::where('Active','=',1)->get();
            foreach($activeQuaterCollections as $activeQuaterCollection){
                $activeQuater = $activeQuaterCollection->Quater;
                // dd($activeQuater);
        }

        $quaterSubStr = substr($activeQuater,1); 
        $quaterSubStr = $quaterSubStr+0;

        $programs = Program::all();
        $programz = Program::where('id','=',$id)->get();
        // dd(count($programz));
                //! this second section of the code is used to get thet grouped bar chart for the quaterly growth.
                $groupedBarChartForPerspectiveProgressPerquater = new DashBoardCharts;
                $groupedBarChartForPerspectiveProgressPerquater->minimalist(false);
                $groupedBarChartForPerspectiveProgressPerquater->height(500);
       
                $groupedLineChartForPerspectiveProgressPerquater = new DashBoardCharts;
                $groupedLineChartForPerspectiveProgressPerquater->minimalist(false);
                $groupedLineChartForPerspectiveProgressPerquater->height(500);
       
       
                $quaterSubStr = substr($activeQuater,1); 
                $quaterSubStr = $quaterSubStr+0;
       
                       for ($i=1; $i <= 4 ; $i++) { 
                           //! this section is used to get the particular perspective groups.
                           # code...
                           $programId = 0;
                           $numberOfNonProrams = 0;
                           foreach ($programz as $program) {                       
                               $perspectivesToCount = Perspective::where('program_id','=',$program->id)
                                                           ->where('perspective_group','=',$i)
                                                           ->get();
                                $programId = $program->id;
                                $programName = $program->name;
                               if(count($perspectivesToCount) == 0){
                                   $numberOfNonProrams++;
                               }
       
                           }
                        //    dd($numberOfNonProrams);
                           $storingArray = array();
                           $storingLineArray = array();
                           array_push($storingLineArray,0);
                           for ($j=1; $j <= $quaterSubStr ; $j++) { 
                               $scoreToPush = 0;
                               // $numberOfNonProrams = 0;
                               $quater = 'Q'.$j;
                                
                               $perspectives = Perspective::where('perspective_group','=',$i)
                                                            ->where('program_id','=',$programId)                                                        
                                                            ->get();
       
                               $strateicObjectiveAverage = 0;
                               $array = array();
                            //    dd($perspectives);
                               foreach ($perspectives as $perspective) {
                                   # code...
                                   $strategicObjectivesSum = 0;
                                   //! getting the strategic objective scores that match up to the strategic sjectives. 
                                   $gettingStrategicObjectivesOfRelatedPerspective = StrategicObjectiveScore::where('perspective_id','=',$perspective->id)
                                                                                                               ->where('year','=',$activeYaer)
                                                                                                               ->where('quater','=',$quater)
                                                                                                               ->get();
                                   
                                   // foreach($gettingStrategicObjectivesOfRelatedPerspective as $strategicbjectiveScore){
                                       // dd(count($gettingStrategicObjectivesOfRelatedPerspective));
                                       
                                       if (count($gettingStrategicObjectivesOfRelatedPerspective) == 0) {
                                           # code...
                                           $strateicObjectiveAverage +=0;
                                       } else {
                                           # code...
                                           foreach ($gettingStrategicObjectivesOfRelatedPerspective as $strategicObjective) {
                                               # code...
                                               $strategicObjectivesSum  += $strategicObjective->score;
                                               
                                           }
                                           $strateicObjectiveAverage += $strategicObjectivesSum/count($gettingStrategicObjectivesOfRelatedPerspective);                                    
                                       } 
                                         
                                   }
       
                                   
                                   //! number of programs that have the perapective. 
                                   
                                   array_push($storingArray,$strateicObjectiveAverage/(count($programz)-$numberOfNonProrams));
                                   array_push($storingLineArray,$strateicObjectiveAverage/(count($programz)-$numberOfNonProrams));
                                   
                           }
       
                           // dd($storingArray);
       
                           switch ($i) {
                               case 1:
                                   # code...
                                   $name = 'Financial Perspetive';
                                   break;
                                   case 2:
                                       $name = 'Customer Perspetive';
                                   break;
                                   case 3: 
                                       $name = 'Inernel Business Perspective';
                                   break;
                                   case 4:  
                                       $name = 'Learning And Growth Perspetive';
                                   break;
       
                               default:
                                   # code...
                                   $name = 'Not Known';
                                   break;
                           }
                           $groupedBarChartForPerspectiveProgressPerquater->dataset( $name,'bar', $storingArray)
                           ->color($borderColors[$i])
                           ->backgroundcolor($fillColors[$i]);
                           $groupedLineChartForPerspectiveProgressPerquater->dataset( $name,'line', $storingLineArray)
                                                                            ->color($borderColors[$i])
                                                                            ->fill(false);
                       }
                       $quaterNames = array();
                       $quaterNamesForLineGraph = array();
                       array_push($quaterNamesForLineGraph,'Start Of'.$activeYaer);
                       for ($i=1; $i <= $quaterSubStr ; $i++) { 
                           array_push($quaterNames, $activeYaer. '   Q'.$i);
                           array_push($quaterNamesForLineGraph, $activeYaer. '   Q'.$i);
                       }
                       $groupedBarChartForPerspectiveProgressPerquater->labels($quaterNames);
                       $groupedLineChartForPerspectiveProgressPerquater->labels($quaterNamesForLineGraph); 

                        $URLstring = url()->current();
                        $admin = 'admin';
                        $programManager = 'programManager';
                        if(strpos($URLstring,$admin) !== false){
                            return view('adminPage.trends.particularPerspectiveTrends',['programName'=>$programName,'programs'=>$programs,'quater'=>$activeQuater,'year'=>$activeYaer,'groupedLineChartForPerspectiveProgressPerquater'=>$groupedLineChartForPerspectiveProgressPerquater,'groupedBarChartForPerspectiveProgressPerquater'=>$groupedBarChartForPerspectiveProgressPerquater]);
                        }

                        if (strpos($URLstring,$programManager) !== false) {
                            # code...
                            // dd('I Am A Program Manager.');
                            return view('user.trends.particularPerspective',['programName'=>$programName,'programs'=>$programs,'quater'=>$activeQuater,'year'=>$activeYaer,'id'=>$id,'groupedLineChartForPerspectiveProgressPerquater'=>$groupedLineChartForPerspectiveProgressPerquater,'groupedBarChartForPerspectiveProgressPerquater'=>$groupedBarChartForPerspectiveProgressPerquater]);
                        }
                        }
    // return view();
    
}
