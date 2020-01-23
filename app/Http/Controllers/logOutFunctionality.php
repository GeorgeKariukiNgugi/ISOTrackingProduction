<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class logOutFunctionality extends Controller
{
    public function loggingOut(){

        Session::forget('name');
        Session::forget('email');
        return redirect('/');
    }
}
