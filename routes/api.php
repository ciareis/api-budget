<?php

use App\Http\Controllers\AuthLoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', AuthLoginController::class);
