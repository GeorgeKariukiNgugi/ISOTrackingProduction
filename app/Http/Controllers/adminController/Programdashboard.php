<?php

namespace App\Http\Controllers\adminController;

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
use App\closedNonConformityEvidence;
//!DASHBOARD CLASS.
use  App\Charts\DashBoardCharts;
class Programdashboard extends Controller
{
    public function programDashboard($id){
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
                                                                        //   ->where('quater','=',$activeQuater)
                                                                          ->get();                                                                    
                //!this section is used to get the scores of the particular strateegic objective.
                //!counting the number of records returned from the scores table. 
                if(count($perspectiveStrategicObjectives) == 0){
                    array_push($chartValues,0);
                }
                else{
                    foreach ($perspectiveStrategicObjectives as $perspectiveStrategicObjective) {
                        # code...
                        array_push($chartValues,$perspectiveStrategicObjective->score);
                    }
                }
            }
    
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
            $gettingStrategicObjectivesOfRelatedPerspective = StrategicObjectiveScore::where('perspective_id','=',$proramPersspective->id)->get();
            if (count($gettingStrategicObjectivesOfRelatedPerspective) == 0) {
                # code...
                $strateicObjectiveAverage =0;
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
    
        $programs = Program::all();
    
        return view('adminPages\programDashboard',['programs'=>$programs,'programDetailsArray'=>$programDetailsArray,'activeYaer'=>$activeYaer,'activeQuater'=>$activeQuater,'chart'=>$chart,'kpiNotScoredNames'=>$kpiNotScoredNames,'allKpis'=>$allKPIsRetrieved,'finalScore'=>$finalScore,'id'=>$id,'charts'=>$charts,'proramPersspectives'=>$proramPersspectives ]);
    }
}
