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
        //AREAS SEED
        DB::table('areas')->insert([
            'id'=>1,
            'nombre'=>'Despacho del Auditor Superior'
        ]);
        DB::table('areas')->insert([
            'id'=>2,
            'nombre'=>'Normatividad'
        ]);
        DB::table('areas')->insert([
            'id'=>3,
            'nombre'=>'Especial Estatal'
        ]);
        DB::table('areas')->insert([
            'id'=>4,
            'nombre'=>'Especial Municipal'
        ]);
        DB::table('areas')->insert([
            'id'=>5,
            'nombre'=>'Planeación'
        ]);
        DB::table('areas')->insert([
            'id'=>6,
            'nombre'=>'Investigación'
        ]);
        DB::table('areas')->insert([
            'id'=>7,
            'nombre'=>'Substanciación'
        ]);        DB::table('areas')->insert([
            'id'=>8,
            'nombre'=>'Unidad Gral de Asuntos Jurídicos'
        ]);
        DB::table('areas')->insert([
            'id'=>9,
            'nombre'=>'Dirección administrativa'
        ]);

        //ROLES SEED
        DB::table('roles')->insert([
            'id'=>1,
            'descripcion'=>'Administrador'
        ]);
        DB::table('roles')->insert([
            'id'=>2,
            'descripcion'=>'Trabajador'
        ]);

        //USUARIOS SEED
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
            'name'=>'Nombre',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>2,
            'area_id'=>1,
            'email'=>"user@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'remember_token'=>null
        ]);


    }
}
