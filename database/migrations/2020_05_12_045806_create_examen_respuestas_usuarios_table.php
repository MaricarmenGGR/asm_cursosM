<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenRespuestasUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_usuarios_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('examen_usuario_id');
            $table->foreign('examen_usuario_id')->references('id')->on('examen_usuario');
            $table->unsignedinteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('examen_preguntas');
            $table->unsignedinteger('respuesta_id');
            $table->foreign('respuesta_id')->references('id')->on('examen_respuestas');
            $table->boolean('correcto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_respuestas_usuarios');
    }
}
