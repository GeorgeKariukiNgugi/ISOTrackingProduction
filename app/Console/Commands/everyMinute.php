<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\reportsGenerated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\NonConformities;
use App\Program;
use App\AssesorPerProgram;
class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
			if(count($nonConformities) <= 0){
				}
			else{
			$assesors = AssesorPerProgram::where('program_id','=',$program->id)->get();
			$assesorProgramArray = array();

			foreach ($assesors as $assesor) {
				# code...
				array_push($assesorProgramArray,$assesor->email);
			}

			$assesorProgramArray = 'gkngugi@safaricom.co.ke';
			Mail::to($assesorProgramArray)->send(new TestMail($nonConformities));
}
			}
			
	}
	catch(Exception $e){

	return "Error";
	}
    }
}
