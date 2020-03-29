<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso-areas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->unsignedinteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->integer('capacidad');
            $table->integer('disponible')->nullable();
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
        Schema::dropIfExists('curso-areas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
