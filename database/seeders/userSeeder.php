<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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