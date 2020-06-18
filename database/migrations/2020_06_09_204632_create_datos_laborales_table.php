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
            $table->unsignedinteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('fechaIngreso');
            $table->string('nombramiento');
            $table->string('tipoTrabajador');
            $table->string('actActuales');
            $table->string('actActualesDesc')->nullable();
            $table->string('responsabilidades');
            $table->string('Puesto');
            $table->string('descPuesto')->nullable();
            $table->string('cursoInduccion');
            $table->string('cursoInduccionDesc')->nullable();
            $table->string('cargosAnt')->nullable();
            $table->string('trabajosExt')->nullable();
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
