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
        //MODALIDAD SEED
        DB::table('modalidades')->insert([
            'id'=>1,
            'nombre'=>'Presencial'
        ]);
        DB::table('modalidades')->insert([
            'id'=>2,
            'nombre'=>'En línea'
        ]);

        //STATUS SEED
        DB::table('status')->insert([
            'id'=>1,
            'descripcion'=>'Planificando'
        ]);
        /*DB::table('status')->insert([
            'id'=>2,
            'descripcion'=>'En inscripciones'
        ]);*/
        DB::table('status')->insert([
            'id'=>3,
            'descripcion'=>'En curso'
        ]);
        DB::table('status')->insert([
            'id'=>4,
            'descripcion'=>'Terminado'
        ]);
       /* DB::table('status')->insert([
            'id'=>5,
            'descripcion'=>'Cancelado'
        ]);*/
        //STATUS DE INSCRIPCION
        DB::table('status')->insert([
            'id'=>6,
            'descripcion'=>'Aceptado'
        ]);
        DB::table('status')->insert([
            'id'=>7,
            'descripcion'=>'Rechazado'
        ]);


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
        DB::table('areas')->insert([
            'id'=>10,
            'nombre'=>'Externa'
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
        DB::table('roles')->insert([
            'id'=>3,
            'descripcion'=>'Auditor Auxiliar'
        ]);
        DB::table('roles')->insert([
            'id'=>4,
            'descripcion'=>'Jefe'
        ]);
        DB::table('roles')->insert([
            'id'=>5,
            'descripcion'=>'Director'
        ]);

        //USUARIOS SEED
        DB::table('users')->insert([
            'id'=>1,
            'name'=>'Admin',
            'apPaterno'=>'Ap P',
            'apMaterno'=>'Ap M',
            'role_id'=>1,
            'area_id'=>1,
            'email'=>"admin@admin.com",
            'email_verified_at'=>null,
            'password' => bcrypt('admin1989'),
            'sexo'=>'Masculino',
            'edoCivil'=>'Soltero',
            'calle'=>'Egipto',
            'colonia'=>'Joyas',
            'nCasa'=>'100',
            'telfono'=>'4423562378',
            'curp'=>'GORMPOEIRNEOEN',
            'nHijos'=>3,
            'edad'=>40,
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name'=>'Usuario1',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>2,
            'area_id'=>1,
            'email'=>"user@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'sexo'=>'Femenino',
            'edoCivil'=>'Soltero',
            'calle'=>'Egipto',
            'colonia'=>'Joyas',
            'nCasa'=>'100',
            'telfono'=>'4423562378',
            'curp'=>'GORMPOEIRNEOEN',
            'nHijos'=>3,
            'edad'=>40,
            'remember_token'=>null
        ]);

        
       /* DB::table('users')->insert([
            'id'=>3,
            'name'=>'User 1',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>2,
            'area_id'=>3,
            'email'=>"user1@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>4,
            'name'=>'User 2',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>2,
            'area_id'=>3,
            'email'=>"user2@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>5,
            'name'=>'User 3',
            'apPaterno'=>'Usr ap',
            'apMaterno'=>'Usr am',
            'role_id'=>2,
            'area_id'=>4,
            'email'=>"user3@user.com",
            'email_verified_at'=>null,
            'password' => bcrypt('user1989'),
            'remember_token'=>null
        ]);*/

    }
}
