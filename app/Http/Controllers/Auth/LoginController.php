<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\AssesorPerProgram;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    //! MODIYFING THE LOGIN FUNCTIONALITY TO REDIRECT THE USERS BASED ON THEIR EMAIL SPECIFICATION.

    protected function redirectTo(){

        //! GETTING THE USER EMAIL ADDRESS AND MAPPING IT TO THE PROGRAMID THAT THE USER NEEDS TO ASSES. 

        $loggedInemail = Auth::user()->email;
        $programids = AssesorPerProgram::where('email','=',$loggedInemail)->get();
        $countingTheUsersReturned = count($programids);
        // dd($countingTheUsersReturned);
        if ($countingTheUsersReturned == 1) {
            # code...
            return '/home';

        } else {
            # code...
            return '/forbidden';
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
