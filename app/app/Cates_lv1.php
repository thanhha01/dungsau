<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cates_lv1 extends Model
{
    protected $table = "cates_lv1";

    public function cates(){
     	return $this->belongsTo('App\Cates','id_cate','id');
    }

    public function cates_lv2(){
    	return $this->hasMany('App\Cates_lv2','id_cate_lv1','id');
    }

    public function product(){
    	return $this->hasMany('App\Products','id_cate_lv1','id');
    }
}
