<?php

namespace App\Domains\Budgets\Contracts;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;

interface BudgetRepositoryContract
{
    public function saveBudget(BudgetInputData $inputData): Budget;
    public function findById($id): null|Budget;
}
