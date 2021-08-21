<?php

namespace App\Http\Controllers;

use App\Domains\Budgets\Budget;

class BudgetPdfController extends Controller
{

    public function __invoke($organization, Budget $budget)
    {
        return view('pdf.budget', ['budget' => $budget]);
    }
}
