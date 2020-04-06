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
            $table->string('apMaterno');
            $table->string('apPaterno');
            $table->string('email')->unique();
            $table->unsignedinteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('curp')->nullable();
            $table->unsignedinteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
