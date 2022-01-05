<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon',function($table){
            $table->increments('id');
            $table->string('hoten')->nullable();
            $table->string('sdt');
            $table->string('diachi')->nullable();
            $table->string('email')->nullable();
            $table->longText('ghichu')->nullable();
            $table->integer('tongtien');
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
        Schema::drop('hoadon');
    }
}
