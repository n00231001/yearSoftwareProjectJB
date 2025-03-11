<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\property;
use Carbon\Carbon;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        property::insert([
            ['user_id' => '1',
            'electricity_id' => '1',
            'oil_id' => '1',
            'gas_id' => '1',
            'address' => '1',
            'type_of_property' => 'appartment',
            'size_of_property' => '20m']  
        ]);
    }
}
