<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('Apakskategorija', function (Blueprint $table) {
            $table->id();
            $table->string('Nosaukums');
            $table->string('Apraksts')->unique();
            $table->unsignedBigInteger('kategorija_id'); // Add the kategorija_id column
            $table->foreign('kategorija_id')->references('K_ID')->on('kategorija')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Apakskategorija');
    }
}
