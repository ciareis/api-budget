<?php

namespace App\GraphQL\Queries;

use App\Support\HealthCheckService;

class HealthCheck
{
    public function __construct(protected HealthCheckService $service)
    {
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return $this->service->handle();
    }
}
