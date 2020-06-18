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
           // $table->increments('id');
            $table->unsignedinteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('Primaria');
            $table->string('Secundaria');
            $table->string('Prepa');
            $table->string('cTecnica');
            $table->string('cProfesional');
            $table->string('nCTecnica')->nullable();
            $table->string('nCProfesional')->nullable();
            $table->string('diplomados')->nullable();
            $table->string('noCedula')->nullable();
            $table->string('Maestrias')->nullable();
            $table->string('cursosExtra')->nullable();
            $table->string('hCapacidades')->nullable();
            $table->string('habilidadesDesc')->nullable();
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
