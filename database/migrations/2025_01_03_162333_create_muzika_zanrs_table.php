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
        Schema::create('muzika_zanrs', function (Blueprint $table) {
            $table->id('MZ_ID'); 
            $table->unsignedBigInteger('Muzika');
            $table->unsignedBigInteger('Zanrs'); 
            $table->foreign('Muzika')->references('Mu_ID')->on('muzika')->onDelete('cascade');
            $table->foreign('Zanrs')->references('Z_ID')->on('zanrs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muzika_zanrs');
    }
};
