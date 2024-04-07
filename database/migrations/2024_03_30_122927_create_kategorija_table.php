<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorijaTable extends Migration
{
    public function up()
    {
        Schema::create('kategorija', function (Blueprint $table) {
            $table->id('K_ID');
            $table->string('Nosaukums');
            $table->string('Apraksts');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategorija');
    }
};
