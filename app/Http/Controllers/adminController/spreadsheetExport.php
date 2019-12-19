<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\adminNonConformitiesExport;
use Maatwebsite\Excel\Facades\Excel;

class spreadsheetExport extends Controller
{
    //

    public function exportingData($type){

        if ($type == 'open') {
            $fileName = 'openNCs';
        } else {
            $fileName = 'closedNCs';
        }
        
        return Excel::download(new adminNonConformitiesExport($type), $fileName.'.xlsx');

    }
}
