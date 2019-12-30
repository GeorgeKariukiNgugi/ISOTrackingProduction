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
        $data6 = [0,45,50];
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
        $programs = Program::all();
        return view('adminPage.trends',['trialCharts'=>$trialCharts,'programs'=>$programs]);
    }
}
