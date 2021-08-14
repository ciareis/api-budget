<?php

namespace App\Domains\Auth\UseCases;

use Exception;
use Illuminate\Contracts\Auth\Guard;

class LoginUseCase
{
    protected Guard $guard;

    public function __construct(Guard $auth)
    {
        $this->guard =  $auth;
    }

    public function handle(string $email, string $password)
    {
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (! $token = $this->guard->attempt($credentials)) {
            throw new Exception('Invalid credentials.');
        }

        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var \App\Domains\Users\User $user
         */
        $user = $this->guard->user();

        return [
            'token' => $token,
            'user' => $user
        ];
    }
}
