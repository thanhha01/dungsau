<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = 'hoadon';

    public function ct_hoadon(){
    	return $this->hasMany('App\Ct_hoadon','ma_hd','id');
    }
}
