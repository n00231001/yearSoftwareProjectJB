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
            'name' => 'John doe',
            'user_id' => '1',
            'email' => 'JohnDoe@' . time() . '@example.com',
            'password' => Hash::make('password'),
            'property_id' => '1',
        ]);
    }
}
