<?php

namespace Tests\Feature;

use Tests\TestCase;

class RunnerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_making_an_api_request()
    {
        $response = $this->getJson('/api/v1/runner/19');

        $response
            ->assertStatus(200);
        // ->assertJson([
        //     'created' => true,
        // ]);
    }

}
