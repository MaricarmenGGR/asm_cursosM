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
            $table->string('nombre')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('horas')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('lugar')->nullable();
            $table->string('ponente')->nullable();
            $table->string('info_ponente')->nullable();
            $table->unsignedinteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status');
            $table->boolean('mostrar')->default(0);
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
        
        Schema::dropIfExists('cursos');

    }
}
