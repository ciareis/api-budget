<?php

namespace App\Domains\Budgets\Contracts;

use App\Domains\Budgets\Budget;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;

interface BudgetRepositoryContract
{
    public function saveBudget(string $tenantId, BudgetInputData $inputData): Budget;
    public function findById(string $tenantId, $id): null|Budget;
    public function findByNumber(string $tenantId, $number): null|Budget;
}
