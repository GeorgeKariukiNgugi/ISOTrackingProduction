<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class tryMail extends Controller
{
    public function trySendingMial(){

        try {
            //code...
            Mail::to('gkngugi@safaricom.co.ke')->send(new TestMail)->getTransport()->stop();
            die('mail sent!');
        return "sent.";
        } catch (\Throwable $th) {
            //throw $th;
            return "Error Thrown.";
        }

        

    }
}
