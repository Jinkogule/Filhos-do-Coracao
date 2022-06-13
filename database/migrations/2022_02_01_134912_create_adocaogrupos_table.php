<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdocaogruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adocaogrupos', function (Blueprint $table) {
            $table->id();
            $table->string('adotante');
            $table->Integer('adotante_id');
            $table->string('adotante_email');
            $table->Integer('familia_id');
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
        Schema::dropIfExists('adocaogrupos');
    }
}
