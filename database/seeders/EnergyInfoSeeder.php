<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EnergyInfo;
use Carbon\Carbon;

class EnergyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimeStamp = Carbon::now();
        //EnergyInfo::factory(1200)->create();  
        insert([
            ['id' => '1', 'electricityUsage' => 100,
            'OilUsage' => 100,
            'electricityConversion' => 1.2 ,
            'oilConversion' => 1.5,
            'dayCreated' => 01,
            'monthCreated' => 01
        ],
        ]);
    }
}
