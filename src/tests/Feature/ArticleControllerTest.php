<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $response = $this->get(route('WeightRegistrations.create'));

        $response->assertStatus(200)
            ->assertViewIs('WeightRegistrations.create');
    }
}
