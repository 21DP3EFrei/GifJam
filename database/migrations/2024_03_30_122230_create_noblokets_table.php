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
            $table->unsignedBigInteger('L_ID')->unique();
            $table->foreign('L_ID')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('Blokets')->default(1);
            $table->string('Iemesls', 200);
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
