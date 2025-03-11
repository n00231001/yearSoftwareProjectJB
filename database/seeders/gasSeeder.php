<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use carbon\Carbon;
use App\Models\Gas;
use App\Models\Properties;

class GasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'gasid' => '1',
            'units' => '80',
            'conversion' => '29',
            'total' => '150',
            'date' => '2025-10-10',
            'time' => '10:10:10',
            'property_id' => '1',
        ]);
    }
}
