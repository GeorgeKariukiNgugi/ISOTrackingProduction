<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class tryMail extends Controller
{
    public function trySendingMial(){
        try{
	Mail::to('gkngugi@safaricom.co.ke')->send(new TestMail);
        return "sent.";
	}
	catch(Exception $e){

	return "Error";
	}

    }
}
