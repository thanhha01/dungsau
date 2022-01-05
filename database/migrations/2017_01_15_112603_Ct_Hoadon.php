<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CtHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_hoadon',function($table){
            $table->increments('id');
            $table->integer('ma_hd')->unsigned();
            $table->foreign('ma_hd')->references('id')->on('hoadon')->onDelete('cascade');
            $table->integer('id_product');
            $table->integer('soluong')->unsigned();
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
        Schema::drop('ct_hoadon');
    }
}
