<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->string('pregunta_1')->default('¿ ?');
            $table->string('pregunta_2')->default('¿ ?');
            $table->string('pregunta_3')->default('¿ ?');
            $table->string('pregunta_4')->default('¿ ?');
            $table->string('pregunta_5')->default('¿ ?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('cuestionarios');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
