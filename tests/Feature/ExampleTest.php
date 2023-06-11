<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_method_get_only(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $this->post('/')->assertStatus(405);
    }
}
