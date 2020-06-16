<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosEscolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_escolares', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('id_user');
            $table->foreign('id_user')->references('id')->on('_user_data_personal');
            $table->string('Primaria');
            $table->string('Secundaria');
            $table->string('Prepa');
            $table->string('cTecnica');
            $table->string('cProfesional');
            $table->string('nCTecnica');
            $table->string('nCProfesional');
            $table->string('diplomados');
            $table->string('noCedula');
            $table->string('Maestrias');
            $table->string('cursosExtra');
            $table->string('hCapacidades');
            $table->string('habilidadesDesc');
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
        Schema::dropIfExists('datos_escolares');
    }
}
