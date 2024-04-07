<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('noblokets', function (Blueprint $table) {
            $table->id('B_ID');
            $table->unsignedBigInteger('L_ID');
            $table->foreign('L_ID')->references('L_ID')->on('lietotaji')->onDelete('cascade');
            $table->boolean('Blokets_lietotajs')->default(false);
            $table->string('Iemesls')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noblokets');
    }
};
