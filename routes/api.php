<?php

use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\HealthCheckController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', AuthLoginController::class);
Route::get('.health_check', HealthCheckController::class);
