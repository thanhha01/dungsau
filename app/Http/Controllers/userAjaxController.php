<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\OtpModel;
use Carbon\Carbon;
use App\Helpers\OtpHelper;
use App\Helpers\MailHelper;

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
    			// $err = "success";
                $err = "verify";
                $otpConf = OtpHelper::generate();
	    		$user = new User;
	    		$user->phone = $phone;
	    		$user->name = $txt_name;
	    		$user->email = $txt_mail;
	    		$user->password = bcrypt($txt_pass);
	    		$user->level = 0;
                $user->otp_token = $otpConf['key'];
	    		$user->save();
                MailHelper::sendOtpVerify($user->email, $otpConf['otp']);
                session()->set("public_key_otp", $otpConf['key']);
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
            $needVerify = false;
            if (Auth::attempt(['email' => $email_login, 'password' => $pass_login],isset($remember))){
                if (Auth::user()->level == 1 ) {
                    $msg = "admin";
                }else {
                    $msg = "user";
                }
                if(!Auth::user()->verified){
                    $needVerify = true;
                }
            }else {
                $msg = "error";
            }
            if($needVerify){
                Auth::logout();
                $otpConf = OtpHelper::generate();
                $user = User::where(['email' => $email_login])->first();
                $user->otp_token = $otpConf['key'];
                $user->save();
                MailHelper::sendOtpVerify($user->email, $otpConf['otp']);
                session()->set("public_key_otp", $otpConf['key']);
            }
            return response()->json([
                "txt_login" => "$msg",
                'verify' => (int)$needVerify
            ]);
        }
    }

    public function verifyOtp(Request $request){
        $otp = $request->otp ?? false;
        $publicKey = session()->get("public_key_otp", null);
        if($otp === false || $publicKey === null){
            return response()->json([
                'success' => false,
                "message" => "OTP code error or public key not found!"
            ]);
        }
        $otp = OtpModel::where(['public_key' => $publicKey, "otp_code" => $otp])->first();
        $user = User::where(['otp_token' => $publicKey])->first();
        if(empty($otp) || empty($user)){
            return response()->json([
                'success' => false,
                "message" => "OTP code not exists or User Verify not found!"
            ]);
        }
        $nowTime = Carbon::parse(date("Y-m-d H:i:s"));
        $startTime = Carbon::parse($otp->time_create);
        $diff = $nowTime->diff($startTime);
        $verifyStatus = $diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h == 0 && $diff->i <= 9;
        if(!$verifyStatus){
            return response()->json([
                'success' => false,
                "message" => "OTP expired!"
            ]);
        }
        $otp->delete();
        session()->forget("public_key_otp");
        $user->otp_token = "";
        $user->verified = 1;
        $user->save();
        return response()->json([
            'success' => true,
            "message" => "OTP verify success!"
        ]);
    }
}
