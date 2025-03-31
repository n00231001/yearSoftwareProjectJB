<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class energyInfoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_energyInfo_can_be_displayed(): void
    {
        $response = $this->get('/energyInfo');

        $response->assertStatus(200);
    }

    public function test_energyInfo_can_be_created(): void
    {
        $response = $this->post('/energyInfo', [
            'electricityUsage' => 100,
            'oilUsage' => 100,
            'electricityConversion' => 1.2,
            'oilConversion' => 1.5,
            'dayCreated' => 1,
            'monthCreated' => 1,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('/dashboard', absolute: false));
    }
}
