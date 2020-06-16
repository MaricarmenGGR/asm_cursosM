<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('examen_id');
            $table->foreign('examen_id')->references('id')->on('examen');
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('terminado');
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
        Schema::dropIfExists('examen_usuarios');
    }
}
