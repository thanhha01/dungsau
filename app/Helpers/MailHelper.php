<?php

namespace App\Helpers;

use App\Mail\SendVerifyAccount;
use Mail;

class MailHelper{
	public static function sendOtpVerify($to, $code){
		$mailTemplate = new SendVerifyAccount(['code' => $code]);
		Mail::to($to)->send($mailTemplate);
	}
}