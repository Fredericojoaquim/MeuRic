<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabalhoautorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalhoautor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trabalho_id')->unsigned();
            $table->bigInteger('autor_id')->unsigned();
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->foreign('autor_id')->references('id')->on('autores');
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
        Schema::dropIfExists('trabalhoautor');
    }
}
