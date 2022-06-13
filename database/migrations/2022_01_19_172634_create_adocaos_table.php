<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adocaos', function (Blueprint $table) {
            $table->id();
            $table->string('adotante');
            $table->Integer('adotante_id');
            $table->string('adotada');
            $table->string('adotante_email');
            $table->Integer('adotada_id');
            $table->string('status');
            $table->string('motivacao');
            $table->string('data');
            $table->string('file_path')->nullable();
            $table->string('depoimento')->nullable();
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
        Schema::dropIfExists('adocaos');
    }
}
