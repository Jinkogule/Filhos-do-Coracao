<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criancas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->Integer('idade');
            $table->string('sexo');
            $table->string('estado_de_saude');
            $table->string('descricao');
            $table->string('localizacao');
            $table->string('file_path');
            $table->string('status')->default('Esperando adoção');
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
        Schema::dropIfExists('criancas');
    }
}
