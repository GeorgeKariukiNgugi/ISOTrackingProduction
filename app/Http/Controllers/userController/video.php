<?php

namespace App\Http\Controllers\userController;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class video extends Controller
{
    //
    public function video($id){
        $programs = Program::all();

        return view('users\video',['programs'=>$programs]);
    }
    
}
