<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyHistoris extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];
        
        // Generate 100 random data entries
        for ($i = 0; $i < 100; $i++) {
            $year = rand(2000, 2024);
            $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
            $day = str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);
            $hour = str_pad(rand(0, 23), 2, '0', STR_PAD_LEFT);
            $minute = '00';
            $second = '00';
            $datetime = "{$year}-{$month}-{$day} {$hour}:{$minute}:{$second}";

            $data[] = [
                'time' => $datetime,
                'Temperature' => rand(0, 100),
                'Humidity' => rand(0, 100),
                'CO2' => rand(0, 100),
                'PM2,5' => rand(0, 100),
                'Wspeed' => rand(0, 100),
                'Wdirection' => rand(0, 360),
            ];
        }

        // Insert data into the database
        DB::table('Historis')->insert($data);
    }
}
