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
        Schema::create('skana_un_kategorija', function (Blueprint $table) {
            $table->id('Skate_ID'); 
            $table->unsignedBigInteger('Skana');
            $table->unsignedBigInteger('Kategorija'); 
            $table->foreign('Skana')->references('Sk_ID')->on('skana')->onDelete('cascade');
            $table->foreign('Kategorija')->references('SKat_ID')->on('skanas_kategorija')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skana_un_kategorija');
    }
};
