<?php

namespace App\Http\Controllers\userControllers;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
class PDFController extends Controller
{
    public function downloadPFD(){
        $data = Program::all();
        $pdf = PDF::loadView('users.templatePDFView', compact('data'));

        return $pdf->download('reportCard.pdf');

    }

    public function link(){

    }
}
