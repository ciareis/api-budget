<?php

namespace Tests\Feature\GraphQL\Queries;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function test_health_check()
    {
        $this->graphQL(/** @lang GraphQL */ '
            query {
              health_check {
                app_name
                database
              }
            }
        ')
        ->assertJson([
            'data' => [
                'health_check' => [
                    'app_name' => env('APP_NAME'),
                    'database' => true,
                ],
            ]
        ]);
    }
}
