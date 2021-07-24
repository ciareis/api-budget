<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrganizationMiddleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $name = $request->segment(1);

        return $next($request);
    }
}
