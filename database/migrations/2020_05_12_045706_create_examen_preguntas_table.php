<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('examen_id');
            $table->foreign('examen_id')->references('id')->on('examen');
            $table->longText('preguntaTxt');
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
        Schema::dropIfExists('examen_preguntas');
    }
}
