<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('examen_preguntas');
            $table->longText('respuestaTxt');
            $table->integer('correcto');
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
        Schema::dropIfExists('examen_respuestas');
    }
}
