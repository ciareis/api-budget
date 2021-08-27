<?php

use App\Models\User;

test("should returns token", function () {
    $password = 'abc123';

    $user = User::factory()->create([
        'password' => bcrypt($password)
    ]);

    $response = $this->_postJson('auth/login', [
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
});

test("invalid password", function () {
    $password = 'abc123';

    $user = User::factory()->create([
        'password' => bcrypt($password)
    ]);

    $response = $this->_postJson('auth/login', [
        'email' => $user->email,
        'password' => 'teste'
    ]);

    $response->assertStatus(401)
        ->assertJsonStructure([
            'message'
        ])
        ->assertJsonFragment([
            'message' => 'Invalid credentials.'
        ]);
});
