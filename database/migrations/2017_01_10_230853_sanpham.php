<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->integer('price');
            $table->integer('sale')->nullable();
            $table->string('image');
            $table->integer('noibat');
            $table->integer('id_cate')->unsigned();
            $table->foreign('id_cate')->references('id')->on('cates')->onDelete('cascade');
            $table->integer('id_cate_lv1')->nullable();
            $table->integer('id_cate_lv2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
