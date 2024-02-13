<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dummy')->insert([
            'id' => 1,
            'time' => '2024-01-01 00:00:00',
            'CO2' => 400,
        ]);

        DB::table('dummy')->insert([
            'id' => 2,
            'time' => '2024-01-01 01:00:00',
            'CO2' => 500,
        ]);

        DB::table('dummy')->insert([
            'id' => 3,
            'time' => '2024-01-01 02:00:00',
            'CO2' => 450,
        ]);

        DB::table('dummy')->insert([
            'id' => 4,
            'time' => '2024-01-01 03:00:00',
            'CO2' => 300,
        ]);

        DB::table('dummy')->insert([
            'id' => 5,
            'time' => '2024-01-01 05:00:00',
            'CO2' => 550,
        ]);

        // Add more data as needed
    }
}
