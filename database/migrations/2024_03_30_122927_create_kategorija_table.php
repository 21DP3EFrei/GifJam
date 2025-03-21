<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */   
    public function up()
    {
        Schema::create('kategorija', function (Blueprint $table) {
            $table->id('K_ID');
            $table->string('Nosaukums', 100);
            $table->string('Apraksts', 300)->nullable();
            $table->unsignedBigInteger('Apakskategorija')->nullable();
            $table->foreign('Apakskategorija')->references('K_ID')->on('kategorija')->onDelete('cascade');
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
        Schema::dropIfExists('kategorija');
    }
};
