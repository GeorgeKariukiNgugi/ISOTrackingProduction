<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogInController extends Controller
{
    //! this controller will handle the login functionality of the application.

    public function logIn(){

        return view('masterLogIn');
    }
}
