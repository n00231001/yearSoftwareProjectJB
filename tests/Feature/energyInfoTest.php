<?php

namespace Tests\Feature;

use App\Models\EnergyInfo; 
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class energyInfoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_energyInfo_can_be_submitted(): void
    {
        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulate a POST request to create an EnergyInfo record
        $response = $this->post('/energyInfo', [
            'electricityUsage' => 100,
            'oilUsage' => 100,
            'electricityConversion' => 1.2,
            'oilConversion' => 1.5,
            'dayCreated' => 1,
            'monthCreated' => 1,
        ]);

        // Assert that the response redirects to the dashboard route
        $response->assertRedirect(route('dashboard'));

        // Optionally, assert that the record was created in the database
        $this->assertDatabaseHas('energy_infos', [
            'electricityUsage' => 100,
            'oilUsage' => 100,
            'electricityConversion' => 1.2,
            'oilConversion' => 1.5,
            'dayCreated' => 1,
            'monthCreated' => 1,
        ]);
    }

    // public function test_energyInfo_can_be_created(): void
    // {
    //     $response = $this->post('/energyInfo', [
    //         'electricityUsage' => 100,
    //         'oilUsage' => 100,
    //         'electricityConversion' => 1.2,
    //         'oilConversion' => 1.5,
    //         'dayCreated' => 1,
    //         'monthCreated' => 1,
    //     ]);

        
    // }
}
