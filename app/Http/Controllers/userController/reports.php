<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\reportsGenerated;
use App\QuaterActive;
use App\YearActive;
use App\Program;

class reports extends Controller
{
    public function viewReports($id){

        //! this ection is used to get the reports that have been stored in the system after being downloaded.
        $reports = reportsGenerated::where('program_id','=',$id)->orderBy('year','desc')->get();


        //! this section is used to get the program name of the report. 
        $programNamesArray = array();
        foreach ($reports as $report) {
            # code...
            $programNames = Program::where('id','=',$report->program_id)->get();

            foreach ($programNames as $programName) {
                # code...
                array_push($programNamesArray,$programName->name);
            }
        }
// dd($programNamesArray);
        return view('user.reports',['id'=>$id,'reports'=>$reports,'programNamesArray'=>$programNamesArray]);
    }

    public function adminReports(){

        $programs = Program::all();
                //! this ection is used to get the reports that have been stored in the system after being downloaded.
                $reports = reportsGenerated::where('id','>',0)->orderBy('program_id','desc')->orderBy('year','desc')->get();


                //! this section is used to get the program name of the report. 
                $programNamesArray = array();
                foreach ($reports as $report) {
                    # code...
                    $programNames = Program::where('id','=',$report->program_id)->get();
        
                    foreach ($programNames as $programName) {
                        # code...
                        array_push($programNamesArray,$programName->name);
                    }
                }

        return view('adminPage.adminReports',['programs'=>$programs,'reports'=>$reports,'programNamesArray'=>$programNamesArray]);
    }
}
