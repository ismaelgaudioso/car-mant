<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'name' => 'Zafira B',
            'desc' => 'Opel Zafira Model B',
            'car_license' => '1111 AAA',
            'first_purchase_date' => "2013/01/15",
            'purchase_date' => "2013/01/15",           
       ]);

       DB::table('cars')->insert([
        'name' => 'Aygo',
        'desc' => 'Toyota Aygo Blue Edition',
        'car_license' => '2222 BBB',
        'first_purchase_date' => "2008/05/28",
        'purchase_date' => "2008/05/28",           
       ]);

    }
}
