<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=>1,
            'descripcion'=>'Administrador'
        ]);
        DB::table('roles')->insert([
            'id'=>2,
            'descripcion'=>'Trabajador'
        ]);
    }
}
