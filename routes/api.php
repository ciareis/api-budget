<?php

use App\Http\Controllers\BudgetStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('budget', BudgetStoreController::class);
