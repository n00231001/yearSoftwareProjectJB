<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'electricityid' => '1',
            'units' => '100',
            'conversion' => '26',
            'total' => '200',
            'date' => '2025-10-10',
            'time' => '10:10:10',
            'property_id' => '1',
        ]);
    }
}
