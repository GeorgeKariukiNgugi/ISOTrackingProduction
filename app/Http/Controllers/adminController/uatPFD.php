<?php

namespace App\Http\Controllers\adminController;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuaterActive;
use App\YearActive;
use App\StrategicObjective;
use PDF;
use App\reportsGenerated;
use App\StrategicObjectiveScore;

class uatPFD extends Controller
{
    public function UatPdfGeneration(){

        $programDetails = Program::where('id','=',1)->get();
        $pdf = PDF::loadView('adminPage.uatGeneration',['programDetails'=>$programDetails]);
        $pdfNames = "first";
        $pdf->save('reports/'.$pdfNames);        
        return $pdf->download($pdfNames);

    }
}
