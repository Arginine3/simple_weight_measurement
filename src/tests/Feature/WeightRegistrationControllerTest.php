<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeightRegistrationControllerTest extends TestCase
{
    //use RefreshDatabase;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testIndex()
    // {
    //     $response = $this->get(route('WeightRegistrations.index'));

    //     $response->assertStatus(200)
    //         ->assertViewIs('WeightRegistrations.index');
    // }

    // public function testIndex()
    // {
    //     $response = $this->get(route('WeightRegistrations.create'));

    //     $response->assertStatus(200)
    //         ->assertViewIs('WeightRegistrations.create');
    // }
}
