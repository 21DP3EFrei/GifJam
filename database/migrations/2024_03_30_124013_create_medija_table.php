<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\UploadType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medija', function (Blueprint $table) {
            $table->id('Me_ID');
            $table->string('Nosaukums', 100);
            $table->string('Apraksts', 200)->nullable();
            $table->boolean('Status')->default(0);
            $table->string('Fails', 300)->nullable();
            $table->enum('Failu_tips', ['.png', '.jpg', '.gif', '.jpeg','.mp3', '.FLAC', '.WAV', '.webp']);
            $table->enum('Augsupielades_tips', array_column(UploadType::cases(), 'value'));
            $table->string('Autors', 100);
            $table->boolean('Autortiesibas');
            $table->unsignedBigInteger('Lietotajs')->nullable();
            $table->foreign('Lietotajs')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('mems');
    }
};
