<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('nomes');
            $table->string('idades');
            $table->string('sexos');
            $table->string('estados_de_saude');
            $table->Integer('q_irmaos');
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
        Schema::dropIfExists('familias');
    }
}
