<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Config;

class OrganizationMiddleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $name = str_replace(".", "_", $request->segment(1));
        $config = Config::get('database.connections._copy_to_change');
        $config = array_merge($config, [
            'schema' => $name,
        ]);

        $exists = \DB::select("select exists(SELECT 1 FROM pg_namespace WHERE nspname = '${name}')")[0];

        if (!$exists->exists) {
           // \DB::select("CREATE SCHEMA {$name}");
        }
        Config::set("database.connections.{$name}", $config);
        Config::set("database.default", $name);

        return $next($request);
    }
}
