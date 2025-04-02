<?php

namespace Database\Factories;

use App\Models\EnergyInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\energyInfo>
 */
class energyInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'electricityUsage' => $this->faker->randomFloat(2, 0, 100),
            'oilUsage' => $this->faker->randomFloat(2, 0, 100),
            'electricityConversion' => $this->faker->randomFloat(2, 0, 100),
            'oilConversion' => $this->faker->randomFloat(2, 0, 100),
            'dayCreated' => $this->faker->randomFloat(2, 0, 100),
            'monthCreated' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
