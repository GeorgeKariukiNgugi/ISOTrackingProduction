<?php

namespace App\Http\Controllers\adminController;

use App\Program;
use App\NonConformities;
use App\closedNonConformityEvidence;
use Illuminate\Http\Request;
use App\KeyPerfomaceIndicator;
use App\Http\Controllers\Controller;

class AdminnonConformities extends Controller
{
    public function viewingNonConformities($type){
        $programs = Program::all();


        // return view('adminPages\nonconformities',['programs'=>$programs,'type'=>$type]);

        $todaysdate = date('Y-m-d H:i:s');
        if ($type == 2) {
            # code...        
            //! this is the section that will look for the nonconformities thatare out of date.
            $nonConformities = NonConformities::where('openClosed', '=', 'open')
                                                ->whereDate('date', '<=',$todaysdate)
                                                ->orderBy('program_id')
                                                ->orderBy('date', 'asc')
                                                ->get();
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

            return view('adminPages\nonconformities',['programs'=>$programs,'kpis'=>$kpis,'type'=>$type,'nonConformities'=>$nonConformities,'arrayWithProgramCodes'=>$arrayWithProgramCodes]);
            
        } else if ($type == 1){
            $nonConformities = NonConformities::where('openClosed', '=', 'open')
                                                ->whereDate('date', '>=',$todaysdate)
                                                ->orderBy('program_id')
                                                ->orderBy('date', 'asc')
                                                ->get();

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
            $nonConformities = NonConformities::where('openClosed', '=', 'closed')       
            ->orderBy('date', 'asc')
            ->orderBy('program_id')
            ->get();
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
