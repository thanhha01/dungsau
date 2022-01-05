<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ct_hoadon extends Model
{
    protected $table = 'ct_hoadon';

    public function hoadon(){
    	return $this->belongsTo('App\Hoadon','ma_hd','id');
    }

     public function product(){
    	return $this->belongsTo('App\Products','id_product','id');
    }
}
