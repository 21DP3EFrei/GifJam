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
        Schema::create('mems', function (Blueprint $table) {
            $table->id('M_ID');
            $table->string('Nosaukums');
            $table->text('Apraksts')->nullable();
            $table->string('Attels', 300)->nullable();
            $table->string('Autors');
            $table->boolean('Autortiesibas');
            $table->boolean('Status')->default(0);
            $table->unsignedBigInteger('Kategorija_ID');
            $table->unsignedBigInteger('Apakskategorija_ID');
            $table->timestamps();

            $table->foreign('Kategorija_ID')->references('K_ID')->on('kategorija')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mems');
    }
};
