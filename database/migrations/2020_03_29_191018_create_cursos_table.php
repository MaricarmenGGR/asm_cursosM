<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('nombreCurso')->nullable();
            $table->unsignedinteger('modalidad_id')->default(1);
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
            $table->string('lugar')->nullable();
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->string('descripcionCurso')->nullable();
            $table->time('horaIncio')->nullable();
            $table->time('horaFin')->nullable();
            $table->integer('horasTotales')->nullable();
            $table->string('nombrePonente')->nullable();
            $table->string('infoPonente')->nullable();
            $table->unsignedinteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status');
            $table->boolean('publicar')->default(0);
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
        
        Schema::dropIfExists('cursos');

    }
}
