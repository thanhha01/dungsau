<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    protected $table = "product_images";

    public function products(){
     	return $this->belongsTo('App\Products','id_product','id');
    }
}
