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
        Schema::create('skana_kategorija', function (Blueprint $table) {
            $table->id('SKat_ID');
            $table->string('Nosaukums', 100);
            $table->string('Apraksts', 300)->nullable();
            $table->unsignedBigInteger('Apakskategorija')->nullable();
            $table->foreign('Apakskategorija')->references('SKat_ID')->on('skana_kategorija')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skana_kategorija');
    }
};
