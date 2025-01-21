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
        Schema::create('skana', function (Blueprint $table) {
            $table->id('Sk_ID');
            $table->integer('Garums');
            $table->unsignedBigInteger('Medija')->nullable();
            $table->foreign('Medija')->references('Me_ID')->on('medija')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skana');
    }
};
