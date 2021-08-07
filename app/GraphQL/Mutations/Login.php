<?php

namespace App\GraphQL\Mutations;

use App\Domains\Auth\UseCases\LoginUseCase;

class Login
{
    public function __construct(protected LoginUseCase $useCase)
    {
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        \Log::info(['args' => $args]);

        $email = $args['email'];
        $password = $args['password'];

        return $this->useCase->handle($email, $password);
    }
}
