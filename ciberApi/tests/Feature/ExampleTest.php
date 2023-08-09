<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Brand;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_the_post_car_run_correct(): void
    {
      $response = $this->post('/api/brand/', ['name' => 'gabriel', 'founder' => 'gabriel', 'foundation_data' => '1990', 'country' => 'gabrel'] );

      $response->assertOk();
      $this->anything();
      $this->assertDatabaseHas(Brand::class, ['name' => 'gabriel']);
    }
//
//    public function test_paginate_routes_correct():void
//    {
//        $response = $this->get(route('get'), ['page[offset]' => ]);
//    }
}
