<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
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

    public function logInUsingLDAP(Request $request){
        // dd("In Here");
        header('Content-type: application/json');
        $_JSON = json_decode(file_get_contents('php://input'), true);
        $username = str_replace('@safaricom.co.ke', '', strip_tags($request->email));
        $password = strip_tags($request->password);
        $ldap_svr = "172.28.229.103";
        $ldap_port = "389";
        $ldapuser = $username."@safaricom.net";
        $uname = "SAFARICOM\\".$username;
        $dn = "ou=safaricom departments,dc=safaricom,dc=net";
        $pieces = explode("\\", $uname);
        $uname1 = $pieces[1];
        $ds = ldap_connect($ldap_svr, $ldap_port);
    
        if ($ds)
        {
            ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
            $ldapbind = @ldap_bind($ds, $ldapuser, $password);
    
            if ($ldapbind)
            {
                $filter = "(sAMAccountName=" . $username . ")";
                $attr = array("memberof", "givenname", "mail", "cn", "sn", "samaccountname");
                $result = ldap_search($ds, $dn, $filter, $attr) or exit("Unable to search LDAP server");
                $entries = ldap_get_entries($ds, $result);
                $givenname = $entries[0]['givenname'][0];
    
                $i = 0;
                $res = [
                    'fullname' => $entries[0]["cn"][0],
                    'givenname' => $entries[0]["givenname"][0],
                    'surname' => $entries[0]["sn"][0],
                    'username' => strtolower($entries[0]["samaccountname"][0]),
                    'email' => $entries[0]["mail"][0]
                ];
                echo json_encode($res);
                echo "This is the email address".$res->email;
                ldap_close($ds);
            }
            else
            {
                http_response_code(401); # Unauthorized
                echo "Invalid credentials. Please try again.";
            }
        }
        else
        {
            http_response_code(503); # Service unavailable
            //echo "Unable to connect to LDAP server";
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
