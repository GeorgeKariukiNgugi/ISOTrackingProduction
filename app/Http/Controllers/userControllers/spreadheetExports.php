<?php

namespace App\Http\Controllers\userControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class SpreadheetExports extends Controller
{
    //! this function is used to handle the sample excell download. 
    public function export($id,$status) 
    {
        return Excel::download(new UsersExport($id,$status), 'nonConformities.xlsx');
    }
}
