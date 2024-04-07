<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaglabatiTable extends Migration
{
    public function up()
    {
        Schema::create('saglabati', function (Blueprint $table) {
            $table->id('S_ID');
            $table->unsignedBigInteger('Lietotaja_ID');
            $table->unsignedBigInteger('Me_ID');
            $table->foreign('Lietotaja_ID')->references('L_ID')->on('lietotaji')->onDelete('cascade');
            $table->foreign('Me_ID')->references('M_ID')->on('mems')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saglabati');
    }
}
