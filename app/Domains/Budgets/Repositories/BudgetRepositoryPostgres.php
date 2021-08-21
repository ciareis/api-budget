<?php

namespace App\Domains\Budgets\Repositories;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use Exception;

class BudgetRepositoryPostgres implements BudgetRepositoryContract
{
    public function saveBudget(string $tenantId, BudgetInputData $inputData): Budget
    {
        $budget = $inputData->budget;
        $budget->tenant_id = $tenantId;

        if ($budget->number && $this->findByNumber($tenantId, $budget->number)) {
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

    public function findById(string $tenantId, $id): null|Budget
    {
        return Budget::where('tenant_id', $tenantId)
            ->find($id);
    }

    public function findByNumber(string $tenantId, $number): null|Budget
    {
        return Budget::where('number', $number)
            ->byTenantId($tenantId)
            ->first();
    }
}
