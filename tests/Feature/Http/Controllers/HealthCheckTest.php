<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function test_health_check()
    {
        $response = $this->_getJson('.health_check');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'database',
                'app_name'
            ])
            ->assertJsonFragment([
                'app_name' => env('APP_NAME'),
                'database' => true,
            ]);
    }
}
