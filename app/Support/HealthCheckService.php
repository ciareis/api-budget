<?php

namespace App\Support;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HealthCheckService
{
    public function handle()
    {
        $database = $this->checkDatabase();

        return [
            'app_name' => config('app.name'),
            'database' => $database,
        ];
    }

    private function checkDatabase()
    {
        try {
            DB::connection()->getPdo();

            return true;
        } catch (Exception $e) {
            $message = 'Could not connect to the database. Please check your configuration.';

            $debug = config('app.debug');

            if ($debug) {
                $message .= ' Error: ' . $e->getMessage();
            }

            $config = config()->get('database.connections' . config('database.default'));

            unset($config['password']);

            Log::error($message, ['config' => $config]);

            return false;
        }
    }
}
