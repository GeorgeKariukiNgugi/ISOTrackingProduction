<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\NonConformities;
use App\Program;
use App\AssesorPerProgram;
class tryMail extends Controller
{
    public function trySendingMial(){
        try{

			$programs = Program::all();
			foreach ($programs as $program) {
				# code...
			$todaysdate = date('Y-m-d H:i:s');
			$nonConformities = NonConformities::where('openClosed', '=', 'open')
                                            ->whereDate('date', '<=',$todaysdate)
                                            // ->where('year','=',$activeYaer)
                                            ->where('program_id','=',$program->id)
                                            ->orderBy('date', 'asc')
                                            ->get();

			// ! this section is used to grt the program assesors. 

			$assesors = AssesorPerProgram::where('program_id','=',$program->id)->get();
			$assesorProgramArray = array();

			foreach ($assesors as $assesor) {
				# code...
				array_push($assesorProgramArray,$assesor->email);
			}

			$assesorProgramArray = 'gkngugi@safaricom.co.ke';
		Mail::to($assesorProgramArray)->send(new TestMail($nonConformities));
        // return "sent.";
			}
			
	}
	catch(Exception $e){

	return "Error";
	}

    }
}
