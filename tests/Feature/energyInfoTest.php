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
        $user = User::factory()->create();

        $response = EnergyInfo::factory()->create([
            'electricityUsage' => 100,
            'oilUsage' => 100,
            'electricityConversion' => 1.2,
            'oilConversion' => 1.5,
            'dayCreated' => 1,
            'monthCreated' => 1,
        ]);

        //$this->assertAuthenticated();
        $response->assertRedirect(route('/dashboard'));
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
