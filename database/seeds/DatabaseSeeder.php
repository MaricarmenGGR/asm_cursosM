<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'id'=>1,
            'nombre'=>'Sistemas y Comuncaciones'
        ]);
        DB::table('roles')->insert([
            'id'=>1,
            'descripcion'=>'Administrador'
        ]);
        DB::table('roles')->insert([
            'id'=>2,
            'descripcion'=>'Trabajador'
        ]);
        DB::table('users')->insert([
            'id'=>1,
            'name'=>'Nombre',
            'apPaterno'=>'Ap P',
            'apMaterno'=>'Ap M',
            'role_id'=>1,
            'area_id'=>1,
            'email'=>"admin@admin.com",
            'email_verified_at'=>null,
            'password' => bcrypt('admin1989'),
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name'=>'Usuario',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>1,
            'area_id'=>1,
            'email'=>"user@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'remember_token'=>null
        ]);

    }
}
