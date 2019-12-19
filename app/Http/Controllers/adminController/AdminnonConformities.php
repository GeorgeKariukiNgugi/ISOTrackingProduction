<?php

namespace App\Http\Controllers\adminController;

use App\Program;
use App\NonConformities;
use App\closedNonConformityEvidence;
use Illuminate\Http\Request;
use App\KeyPerfomaceIndicator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminnonConformities extends Controller
{
    public function viewingNonConformities($type, $program){
        $programs = Program::all();


        // return view('adminPages\nonconformities',['programs'=>$programs,'type'=>$type]);

        $todaysdate = date('Y-m-d H:i:s');
        if ($type == 2) {
            # code...    
            if ($program ==0) {
                
                 //! this is the section that will look for the nonconformities thatare out of date.
            $nonConformities = NonConformities::where('openClosed', '=', 'open')
            ->whereDate('date', '<=',$todaysdate)
            ->orderBy('program_id')
            ->orderBy('date', 'asc')
            ->get();

            $titleName = " The following Are All The OverDue Non Conformities.";

            } elseif($program == 1) {
                # code...
                //! first get the program that the user wants.
                $program = Input::get('program');

                if ($program == 0) {
                    # code...
                    $nonConformities = NonConformities::where('openClosed', '=', 'open')
                    ->whereDate('date', '<=',$todaysdate)
                    ->orderBy('program_id')
                    ->orderBy('date', 'asc')
                    ->get();
                    $titleName = " The following Are All The OverDue Non Conformities.";
                } else {
                    # code...
                 //! this is the section that will look for the nonconformities thatare out of date.
                    $nonConformities = NonConformities::where('openClosed', '=', 'open')
                    ->where('program_id','=',$program)
                    ->whereDate('date', '<=',$todaysdate)
                    ->orderBy('program_id')
                    ->orderBy('date', 'asc')
                    ->get();

                    $proramNames = Program::where('id','=',$program)->get();
                    foreach ($proramNames as $proramName) {
                        # code...
                        $titleName = $proramName->name;
                    }
                    }
                }
                
                
                
           
            //!establising an array that will store the non-conformities program codes.
            $arrayWithProgramCodes = array();
            foreach($nonConformities as $nonConformity){
                $program_id = $nonConformity->program_id;

                $program = Program::where('id','=',$program_id)->get();

                foreach ($program as $programExtension) {
                    # code...
                    $programCode = $programExtension->shortHand;
                    array_push($arrayWithProgramCodes,$programCode);
                }

            }
            $kpis = KeyPerfomaceIndicator::all();

            return view('adminPages\nonconformities',['programs'=>$programs,'titleName'=>$titleName,'kpis'=>$kpis,'type'=>$type,'nonConformities'=>$nonConformities,'arrayWithProgramCodes'=>$arrayWithProgramCodes]);
            
        } else if ($type == 1){

            if ($program == 0) {
                $nonConformities = NonConformities::where('openClosed', '=', 'open')
                ->whereDate('date', '>=',$todaysdate)
                ->orderBy('program_id')
                ->orderBy('date', 'asc')
                ->get();
            }
            else{
                $program = Input::get('program');
                if ($program == 0) {
                    $nonConformities = NonConformities::where('openClosed', '=', 'open')
                    ->whereDate('date', '>=',$todaysdate)
                    ->orderBy('program_id')
                    ->orderBy('date', 'asc')
                    ->get();
                }
                else{
                    $nonConformities = NonConformities::where('openClosed', '=', 'open')
                    ->where('program_id','=',$program)
                    ->whereDate('date', '>=',$todaysdate)
                    ->orderBy('program_id')
                    ->orderBy('date', 'asc')
                    ->get();
                }
            }

           

            // dd(count($nonConformities));                                                
            //!establising an array that will store the non-conformities program codes.
            $arrayWithProgramCodes = array();
            foreach($nonConformities as $nonConformity){
                $program_id = $nonConformity->program_id;

                $program = Program::where('id','=',$program_id)->get();

                foreach ($program as $programExtension) {
                    # code...
                    $programCode = $programExtension->shortHand;
                    array_push($arrayWithProgramCodes,$programCode);
                }

            }

            //! getting all the key perfomance indicators.
            $kpis = KeyPerfomaceIndicator::all();

            return view('adminPages\nonconformities',['programs'=>$programs,'kpis'=>$kpis,'type'=>$type,'nonConformities'=>$nonConformities,'arrayWithProgramCodes'=>$arrayWithProgramCodes]);

        }
        else if ($type == 0){

            if ($program ==0) {
                $nonConformities = NonConformities::where('openClosed', '=', 'closed')       
                ->orderBy('date', 'asc')
                ->orderBy('program_id')
                ->get();
            }
            else {
                # code...
                $program = Input::get('program');
                if ($program ==0) {
                    $nonConformities = NonConformities::where('openClosed', '=', 'closed')       
                    ->orderBy('date', 'asc')
                    ->orderBy('program_id')
                    ->get();
                }
                else {
                    # code...
                    $nonConformities = NonConformities::where('openClosed', '=', 'closed')
                    ->where('program_id','=',$program)       
                    ->orderBy('date', 'asc')
                    ->orderBy('program_id')
                    ->get();
                }
                
            }

           
                //!establising an array that will store the non-conformities program codes.
                $arrayWithProgramCodes = array();
                foreach($nonConformities as $nonConformity){
                    $program_id = $nonConformity->program_id;
    
                    $program = Program::where('id','=',$program_id)->get();
    
                    foreach ($program as $programExtension) {
                        # code...
                        $programCode = $programExtension->shortHand;
                        array_push($arrayWithProgramCodes,$programCode);
                    }
    
                }
            //! getting the details that will be sent to the closed non conformities.
                $closedNonConformities = closedNonConformityEvidence::all(); 
                
                $kpis = KeyPerfomaceIndicator::all();

            return view('adminPages\nonconformities',['programs'=>$programs,'closedNonConformities'=>$closedNonConformities,'kpis'=>$kpis,'type'=>$type,'nonConformities'=>$nonConformities,'arrayWithProgramCodes'=>$arrayWithProgramCodes]);
        }     
    }
}
