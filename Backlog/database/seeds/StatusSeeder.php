<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => "В работе"
        ]); 
        DB::table('status_task')->insert([
            'name' => "Закрыта"
        ]); 
    }
}
