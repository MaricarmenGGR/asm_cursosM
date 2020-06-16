<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_laborales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('id_user');
            $table->foreign('id_user')->references('id')->on('_user_data_personal');
            $table->string('fechaIngreso');
            $table->unsignedinteger('cargo');
            $table->foreign('cargo')->references('id')->on('roles');
            $table->string('nombramiento');
            $table->unsignedinteger('areaT');
            $table->foreign('areaT')->references('id')->on('areas');
            $table->string('tipoTrabajador');
            $table->string('actActualesDesc');
            $table->string('Puesto');
            $table->string('descPuesto');
            $table->string('cursoInduccion');
            $table->string('cursoInduccionDesc');
            $table->string('cargosAnt');
            $table->string('trabajosExt');
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
        Schema::dropIfExists('datos_laborales');
    }
}
