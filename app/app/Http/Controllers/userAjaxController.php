<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class userAjaxController extends Controller
{
    function register(Request $request){
    	if($request->ajax()){
    		$phone = $request->get('phone');
    		$txt_pass = $request->get('txt_pass');
    		$txt_name = $request->get('txt_name');
    		$txt_mail = $request->get('txt_mail');
    		$_token = $request->get('_token');
    		$test_email = DB::table('users')->select('email')->where('email', '=', $txt_mail)->get();
    		if(count($test_email) == 0){
    			$err = "success";
	    		$user = new User;
	    		$user->phone = $phone;
	    		$user->name = $txt_name;
	    		$user->email = $txt_mail;
	    		$user->password = bcrypt($txt_pass);
	    		$user->level = 0;
	    		$user->save();
    		}else {
    			$err = "error";
    		}
			echo json_encode(
	   			array(
	   				"txt" => "$err"
		   		)
	    	);
    		
    	}
    }

    function userLogin(Request $request){
        if ($request->ajax()) {
            $email_login = $request->get('email_login');
            $pass_login = $request->get('pass_login');
            $_token = $request->get('_token');
            $remember = $request->get('remember');
            if (Auth::attempt(['email' => $email_login, 'password' => $pass_login],isset($remember))){
                if (Auth::user()->level == 1 ) {
                    $msg = "admin";
                }else {
                    $msg = "user";
                }
            }else {
                $msg = "error";
            }
            echo json_encode(
                array(
                    "txt_login" => "$msg"
                )
            );
        }
    }
}
