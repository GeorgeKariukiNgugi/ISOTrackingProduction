<?php

namespace App\Http\Controllers\adminController;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Charts\DashBoardCharts;
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

        $borderColors2 = [
            // "rgba(255, 99, 132, 1.0)",
            // "rgba(22,160,133, 1.0)",
            // "rgba(255, 205, 86, 1.0)",
            // "rgba(51,105,232, 1.0)",
            // "rgba(244,67,54, 1.0)",
            // "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors2 = [
            // "rgba(255, 99, 132, 0.2)",
            // "rgba(22,160,133, 0.2)",
            // "rgba(255, 205, 86, 0.2)",
            // "rgba(51,105,232, 0.2)",
            // "rgba(244,67,54, 0.2)",
            // "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $usersChart = new DashBoardCharts;
        $usersChart->minimalist(false);
        $usersChart->labels(['Jan', 'Feb', 'Mar']);

        $usersChart->dataset('ITSMS', 'bar', [10, 25, 13])
            ->color($borderColors)
            // ->label("First")
            ->backgroundcolor($fillColors);

        $usersChart->dataset('ISMS', 'bar', [20, 50, 26])
            ->color($borderColors2)
            ->backgroundcolor($fillColors2);

        $usersChart->dataset('QMS', 'bar', [30, 75, 39])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        $programs = Program::all();
        return view('adminPage.trends',['trialCharts'=>$trialCharts,'programs'=>$programs,'usersChart'=>$usersChart]);
    }
}
