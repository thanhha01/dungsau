<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cates_lv2 extends Model
{
    protected $table = "cates_lv2";

    public function cates_lv1(){
     	return $this->belongsTo('App\Cates_lv1','id_cate_lv1','id');
    }

    public function product(){
    	return $this->hasMany('App\Products','id_cate_lv2','id');
    }
}
