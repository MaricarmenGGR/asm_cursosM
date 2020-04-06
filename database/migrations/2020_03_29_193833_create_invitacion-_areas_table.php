<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitacionAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitacion-areas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->unsignedinteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('enterado')->default(0);
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
        Schema::dropIfExists('invitacion-areas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
