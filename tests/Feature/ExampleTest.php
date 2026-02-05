<?php

<<<<<<< HEAD
test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
=======
namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e
