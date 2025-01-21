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
            $table->unsignedBigInteger('Medija_ID');
            $table->foreign('Lietotaja_ID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Medija_ID')->references('Me_ID')->on('medija')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saglabati');
    }
}
