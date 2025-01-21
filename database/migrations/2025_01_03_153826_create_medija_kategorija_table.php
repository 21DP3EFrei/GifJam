<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medija_kategorija', function (Blueprint $table) {
            $table->id('MK_ID'); 
            $table->unsignedBigInteger('Medija_id');
            $table->unsignedBigInteger('Kategorija_id'); 

            $table->foreign('Kategorija_id')->references('K_ID')->on('kategorija')->onDelete('cascade');
            $table->foreign('Medija_id')->references('Me_ID')->on('medija')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medija_kategorija');
    }
};
