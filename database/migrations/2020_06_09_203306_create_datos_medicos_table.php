<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_medicos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('id_user');
            $table->foreign('id_user')->references('id')->on('_user_data_personal');
            $table->string('tipoSangre');
            $table->string('noImss');
            $table->string('nombreEmergencia');
            $table->string('telEmergencia');
            $table->string('parentesco');
            $table->string('alergias');
            $table->string('enfermedades');
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
        Schema::dropIfExists('datos_medicos');
    }
}
