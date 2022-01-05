<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\Hash;
use App\OtpModel;

class OtpHelper{
	public static function generate(){
		$otp = random_int(100000, 999999);
		$key = Hash::make($otp);
		OtpModel::insert([
			"public_key" => $key,
			"otp_code" => $otp,
			"time_create" => date("Y-m-d H:i:s")
		]);
		return [
			'otp' => $otp,
			'key' => $key
		];
	}
	public static function verify($otp, $publicKey, $removeOnSuccess = true){
		$otp = OtpModel::where(['public_key' => $publicKey])->first();
		if(empty($otp)){
			return false;
		}
		if($otp->otp_code != $otp){
			return false;
		}
		if($removeOnSuccess){
			$otp->delete();
		}
		return true;
	}
}