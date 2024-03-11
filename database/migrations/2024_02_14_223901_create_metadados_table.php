<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trabalho_id')->unsigned();
            $table->string('orientador_id');
            $table->string('titulo');
            $table->string('lingua');
            $table->date('data_criacao');
            $table->string('local');
            $table->text('resumo');
            $table->text('palavra_chave');
            $table->text('fontes');
            $table->text('formato');
            $table->text('tamanho');
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->foreign('orientador_id')->references('id')->on('orientadores');
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
        Schema::dropIfExists('metadados');
    }
}
