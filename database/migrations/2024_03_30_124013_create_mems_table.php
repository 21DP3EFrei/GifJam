<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemsTable extends Migration
{
    public function up()
    {
        Schema::create('mems', function (Blueprint $table) {
            $table->id('M_ID');
            $table->string('Nosaukums');
            $table->string('Apraksts');
            $table->string('Fails');
            $table->string('Autors');
            $table->boolean('Autortiesibas');
            $table->boolean('Status');
            $table->unsignedBigInteger('Kategorija_ID');
            $table->foreign('Kategorija_ID')->references('K_ID')->on('kategorija');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mems');
    }
}
