<?php

namespace App\Http\Controllers;

use App\Support\HealthCheckService;

class HealthCheckController extends Controller
{
    public function __construct(protected HealthCheckService $service)
    {
    }

    public function __invoke()
    {
        return $this->service->handle();
    }
}
