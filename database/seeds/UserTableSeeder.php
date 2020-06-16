<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@mail.ru',
            'password'=>bcrypt('12345678'),
            'is_admin'=>1
        ]);
        for ($i=0;$i<=20;$i++){
            DB::table('users')->insert([
                'name'=>'user'.$i,
                'email'=>'user'.$i.'@mail.ru',
                'password'=>bcrypt('12345678'),
            ]);
        }
    }
}
