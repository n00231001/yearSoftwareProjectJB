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
            'property_id' => '1',
            'user_id' => '1',
            'electricityid' => '1',
            'oilid' => '1',
            'gasid' => '1',
            'address' => '1',  
        ]);
    }
}
