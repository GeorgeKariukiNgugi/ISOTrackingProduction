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
class trends extends Controller
{
    

    //! this function is used to do the trial trends that are in the form of a line graph. 

    public function trialTrends(){
        $trialCharts = new DashBoardCharts;
        $data1 = [0, 25, 13];
        $data2 = [0,50,26];
        $data3 = [0,14,33];
        $data4 = [0,18,44];
        $data5 = [0,17,19];
        $data6 = [0,00,50];
        // $trialCharts->displaylegend(true);
        // $trialCharts->displayAxes(true, true);
        // $trialCharts->title('Users by Months', 30, "rgb(255, 99, 132)", true, 'Helvetica Neue');
        $trialCharts->height(550);
        $trialCharts->labels(['2019 Q1', '2019 Q2', '2019 Q3']);
        $trialCharts->dataset('ISMS', 'line', $data1)->fill(false)->color("rgb(255, 99, 132)");
        $trialCharts->dataset('ITSMS', 'line', $data2)->fill(false)->color("rgb(0, 0, 255)");
        $trialCharts->dataset('QMS', 'line', $data3)->fill(false)->color("rgb(255, 0, 255)");
        $trialCharts->dataset('EMS', 'line', $data4)->fill(false)->color("rgb(0, 255, 255)");
        $trialCharts->dataset('BCMS', 'line', $data5)->fill(false)->color("rgb(0, 0, 0)");
        $trialCharts->dataset('CSR', 'line', $data6)->fill(false)->color("rgb(255, 0, 0)");
        // $trialCharts->data(
        //     dataset
        // )

        //! this is the code for the grouped bar charts. 
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

        $usersChart = new DashBoardCharts;
        $usersChart->minimalist(false);
        $usersChart->height(550);
        $usersChart->labels(['ITSMS 2019/2020 Quaterly Trends.', 'ISMS 2019/2020 Quaterly Trends.', 'QMS 2019/2020 Quaterly Trends.','EMS 2019/2020 Quaterly Trends.','CSR 2019/2020 Quaterly Trends.','BCMS 2019/2020 Quaterly Trends.']);
        // $usersChart->labels(['Jan1', 'Feb1', 'Mar1']);

        $usersChart->dataset('Q1','bar', [10, 25, 13,42,23,45])
            ->color($borderColors[0])
            ->backgroundcolor($fillColors[0]);

        $usersChart->dataset('Q2','bar', [20, 50, 26,33,53,66])
            ->color($borderColors[1])
            ->backgroundcolor($fillColors[1]);

        $usersChart->dataset('Q3','bar', [30, 75, 39,28,34,45])
            ->color($borderColors[2])
            ->backgroundcolor($fillColors[2]);

        $usersChart->dataset('Q4','bar', [30, 75, 39,14,45,12])
            ->color($borderColors[3])
            ->backgroundcolor($fillColors[3]);       

        $programs = Program::all();
        return view('adminPage.trends',['trialCharts'=>$trialCharts,'programs'=>$programs,'usersChart'=>$usersChart]);
    }

    public function mainController(){

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

        $programs = Program::all();

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

        //! this section of the code is used to initialise the chart object that us used to create the grouped bar chart. 

            $groupedBarChartForProgramProgress = new DashBoardCharts;
            $groupedBarChartForProgramProgress->minimalist(false);
            $groupedBarChartForProgramProgress->height(550);

            $quaterSubStr = substr($activeQuater,1); 
            $quaterSubStr = $quaterSubStr+0;
            // dd($quaterSubStr); 
            $programsNames = array();
            
            for ($i=1; $i <= $quaterSubStr ; $i++) { 
                # code...
                // dd("data.");
                $quaterScoresPerProgramArray = array();
            foreach($programs as $program){

                //! this is the array that is used to hold the program scores per quater.
                
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
                //! pushing the scores to the arrays. 

                array_push($quaterScoresPerProgramArray,$finalScore);

            }
            
            //! initialising the dataset of the programs.

            $groupedBarChartForProgramProgress->dataset( $activeYaer.' Quater'.$i,'bar', $quaterScoresPerProgramArray)
            ->color($borderColors[$i])
            ->backgroundcolor($fillColors[$i]);

            }   

            //! this section of the code is used to get the labels that will be used for the labels of the program.
            foreach($programs as $programLabel){
                array_push($programsNames,$programLabel->shortHand);
            }
            
            $groupedBarChartForProgramProgress->labels($programsNames);  
            
            

            //! THI
            
        return view('adminPage.trends.programTrend',['programs'=>$programs,'groupedBarChartForProgramProgress'=>$groupedBarChartForProgramProgress]);
    }
}
