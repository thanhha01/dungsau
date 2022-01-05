<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $table = "products";

    public function cates(){
     	return $this->belongsTo('App\Cates','id_cate','id');
    }

    public function cates_lv1(){
     	return $this->belongsTo('App\Cates_lv1','id_cate_lv1','id');
    }

    public function cates_lv2(){
     	return $this->belongsTo('App\Cates_lv2','id_cate_lv2','id');
    }

    public function product_images(){
    	return $this->hasMany('App\Product_images','id_product','id');
    }
}
