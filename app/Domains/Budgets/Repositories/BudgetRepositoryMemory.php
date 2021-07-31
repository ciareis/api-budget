<?php

namespace App\Domains\Budgets\Repositories;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use Exception;
use Illuminate\Support\Str;

class BudgetRepositoryMemory implements BudgetRepositoryContract
{
    protected $budgets = [];

    public function saveBudget(BudgetInputData $inputData): Budget
    {
        $budget = $inputData->budget;
        if ($budget->number && $this->findByNumber($budget->number)) {
            throw new Exception('Número existente. Tente outro número.');
        }
        $budget->id = Str::uuid()->toString();
        if (!$budget->number) {
            $budget->number = collect($this->budgets)->max('number') + 1;
        }

        $this->budgets[] = $budget;

        return $budget;
    }

    public function findById($id): null|Budget
    {
        return collect($this->budgets)->first(fn($budget) => $budget->id === $id);
    }

    public function findByNumber($number): null|Budget
    {
        return collect($this->budgets)->first(fn($budget) => $budget->number === $number);
    }
}
