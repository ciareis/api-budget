<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class AuthLoginControllerTest extends TestCase
{
    public function test_should_returns_token()
    {
        $password = 'abc123';

        $user = User::factory()->create([
            'password' => bcrypt($password)
        ]);

        $response = $this->post('api/organização/auth/login', [
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                    'user' => [
                        'id',
                        'email',
                    ]
                ]
            ]);
    }
}
