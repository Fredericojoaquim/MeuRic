<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trabalho_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('estado')->nullable();
            $table->string('descricao')->nullable();
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('notificacao');
    }
}
