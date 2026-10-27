<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogApiTest extends TestCase
{
    public function test_api_ping_returns_successful_response(): void
    {
        $response = $this->getJson('/api/ping');

        $response->assertStatus(200)
                 ->assertJson([
                     'pong' => true,
                 ]);
    }

    public function test_api_greet_returns_correct_name(): void
    {
        $response = $this->getJson('/api/greet/Mortaza');

        $response->assertStatus(200)
                 ->assertJson([
                     'greeting' => 'Hello, Mortaza!',
                 ]);
    }
}
