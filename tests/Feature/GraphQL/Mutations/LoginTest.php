<?php

namespace Tests\Feature\GraphQL\Mutations;

use App\Models\User;
use Tests\TestCase;

class LoginUseCaseTest extends TestCase
{
    public function test_should_returns_token()
    {
        $password = 'abc123';

        $user = User::factory()->create([
            'password' => bcrypt($password)
        ]);

        $response = $this->graphQL(/** @lang GraphQL */ '
            mutation login($email: String! $password: String!) {
                login(email: $email, password: $password) {
                    token
                }
            }
        ', [
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'login' => [
                        'token'
                    ]
                ]
            ]);
    }

    public function test_should_not_login()
    {
        $password = 'abc123';

        User::factory()->create([
            'password' => bcrypt('teste')
        ]);

        $user = User::factory()->create([
            'password' => bcrypt($password)
        ]);

        $response = $this->graphQL(/** @lang GraphQL */ '
            mutation login($email: String! $password: String!) {
                login(email: $email, password: $password) {
                    token
                }
            }
        ', [
            'email' => $user->email,
            'password' => "teste"
        ])->assertGraphQLErrorMessage('Internal server error');
    }
}
