<?php

use App\Http\Controllers\BudgetPdfController;
use App\Http\Controllers\BudgetStoreController;
use Illuminate\Support\Facades\Route;

Route::post('budget', BudgetStoreController::class);
Route::get('budget/{budget}/pdf', BudgetPdfController::class)
    ->name('budget.pdf');
