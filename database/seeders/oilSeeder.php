<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'oilid' => '1',
            'units' => '120',
            'conversion' => '16',
            'total' => '300',
            'date' => '2025-01-12',
            'time' => '12:10:21',
            'property_id' => '1',
        ]);
    }
}
