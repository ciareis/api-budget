<?php

namespace App\Domains\Budgets\Repositories;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use Exception;

class BudgetRepositoryPostgres implements BudgetRepositoryContract
{
    public function saveBudget(BudgetInputData $inputData): Budget
    {
        $budget = $inputData->budget;

        if ($budget->number && $this->findByNumber($budget->number)) {
            throw new Exception('Número existente. Tente outro número.');
        }

        if (!$budget->number) {
            $budget->number = Budget::max('number') + 1;
        }

        if (!$budget->date) {
            $budget->date = now();
        }

        $budget->save();

        return $budget;
    }

    public function findById($id): null|Budget
    {
        return Budget::find($id);
    }

    public function findByNumber($number): null|Budget
    {
        return Budget::where('number', $number)->first();
    }
}
