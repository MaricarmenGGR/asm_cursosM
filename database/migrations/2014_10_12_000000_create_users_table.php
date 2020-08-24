<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset='utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('name');
            $table->string('apPaterno');
            $table->string('apMaterno');
            $table->integer('edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('edoCivil')->nullable();
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('nCasa')->nullable();
            $table->string('telfono')->nullable();
            $table->string('curp')->nullable();
            $table->integer('nHijos')->nullable();
            $table->string('cargo')->nullable();
            $table->string('puesto')->nullable();
            $table->string('dependencia')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedinteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('password');
            $table->unsignedinteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->rememberToken();
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
        
        Schema::dropIfExists('users');
        
    }
}
