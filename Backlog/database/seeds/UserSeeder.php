<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Maxim",
            'email' => Str::random(10).'@gmail.com',
            'password' => "1234",
            'role_id' => 1,
        ]);
    }
}
