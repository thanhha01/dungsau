<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("otp", function($table){
            $table->increments('id');
            $table->string("public_key");
            $table->string("otp_code");
            $table->string("time_create");
            $table->timestamps();
        });
    }
}
