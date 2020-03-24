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
        DB::table('users')->insert([
            'id'=>0,
            'name'=>'Carlos',
            'apPaterno'=>'Cedeno',
            'apMaterno'=>'Martinez',
            'id_role'=>1,
            'email'=>"carlos@admin.com",
            'email_verified_at'=>null,
            'password' => bcrypt('carlosadmin'),
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>0,
            'name'=>'Maricarmen',
            'apPaterno'=>'X',
            'apMaterno'=>'X',
            'id_role'=>1,
            'email'=>"maricarmen@admin.com",
            'email_verified_at'=>null,
            'password' => bcrypt('maricarmenadmin'),
            'remember_token'=>null
        ]);
        DB::table('users')->insert([
            'id'=>0,
            'name'=>'Alexa',
            'apPaterno'=>'X',
            'apMaterno'=>'X',
            'id_role'=>1,
            'email'=>"alexa@admin.com",
            'email_verified_at'=>null,
            'password' => bcrypt('alexaadmin'),
            'remember_token'=>null
        ]);

    }
}
