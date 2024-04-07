<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLietotajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lietotaji', function (Blueprint $table) {
            $table->id('L_ID');
            $table->string('Vards');
            $table->string('E_pasts')->unique(); // Assuming E-pasts is for email
            $table->string('Parole');
            $table->boolean('Adminastrators')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('lietotaji');
    }
}