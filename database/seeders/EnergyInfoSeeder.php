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
        EnergyInfo::insert([
            ['property_id' => '1', 'ElecUsage' => 100, 'OilUsage' => 100, 'gasUsage' => 120, 'ElecConversion' => 120 , 'oilConversion' => 100, 'gasConversion' => 200, 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
        ]);
    }
}
