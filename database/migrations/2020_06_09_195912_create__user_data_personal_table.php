<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_user_data_personal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('aPaterno');
            $table->string('aMaterno');
            $table->string('nombres');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('edoCivil');
            $table->string('calle');
            $table->string('colonia');
            $table->string('nCasa');
            $table->string('telfono');
            $table->string('correo');
            $table->string('curp');
            $table->integer('nHijos');
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
        Schema::dropIfExists('_user_data_personal');
    }
}
