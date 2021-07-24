<?php

namespace App\Domains\Budgets\Repositories;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use Illuminate\Support\Str;

class BudgetRepositoryMemory implements BudgetRepositoryContract
{
    protected $budgets = [];

    public function saveBudget(BudgetInputData $data): array
    {
        $params = $data->toArray();
        $params['id'] = Str::uuid()->toString();

        $this->budgets[] = $params;

        return $params;
    }

    public function findById($id): array
    {
        return collect($this->budgets)->first(fn($budget) => $budget['id'] === $id);
    }
}
