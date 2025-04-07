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
        Schema::create('muzika', function (Blueprint $table) {
            $table->id('Mu_ID');
            $table->year('Izlaists')->nullable();
            $table->unsignedBigInteger('Medija')->nullable();
            $table->foreign('Medija')->references('Me_ID')->on('medija')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muzika');
    }
};
