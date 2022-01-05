<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoaiSP2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates_lv2', function ($table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias');
            $table->integer('id_cate_lv1')->unsigned();
            $table->foreign('id_cate_lv1')->references('id')->on('cates_lv1')->onDelete('cascade');
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
        Schema::drop('cates_lv2');
    }
}
