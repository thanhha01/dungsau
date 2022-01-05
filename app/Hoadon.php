<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = 'hoadon';

    public function ct_hoadon(){
    	return $this->hasMany('App\Ct_hoadon','ma_hd','id');
    }

    public static function acceptCart($id){
        $cart = self::where(['id' => $id])->first();
        if(empty($cart)){
            return false;
        }
        $cart->status = 1;
        $cart->save();
        return true;
    }
}
