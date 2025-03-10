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
