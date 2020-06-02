<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class errorAndNoPageError extends Controller
{
    public function noPage(){
        // ! checking the previous rote that the user had visited.
        if(Session::has('email')){
            return  redirect('/');
        }
        else{
            return redirect('/');
        }
            
    }
}
