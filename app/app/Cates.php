<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    protected $table = 'cates';
    
    public function cates_lv1(){
    	return $this->hasMany('App\Cates_lv1','id_cate','id');
    }

    public function cates_lv2(){
    	return $this->hasManyThrough('App\Cates_lv2','App\Cates_lv1','id_cate','id_cate_lv1','id');
    }

    public function product(){
    	return $this->hasMany('App\Products','id_cate','id');
    }
}
