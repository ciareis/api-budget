<?php

namespace App\Domains\Budgets\Repositories;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;

class BudgetRepositoryPostgres implements BudgetRepositoryContract
{
    public function saveBudget(BudgetInputData $inputData): Budget
    {
        $budget = $inputData->budget;

        $budget->save();

        return $budget;
    }

    public function findById($id): null|Budget
    {
        return Budget::find($id);
    }
}
