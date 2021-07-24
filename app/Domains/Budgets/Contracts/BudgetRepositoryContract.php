<?php

namespace App\Domains\Budgets\Contracts;

use App\Domains\Budgets\UseCases\Data\BudgetInputData;

interface BudgetRepositoryContract
{
    public function saveBudget(BudgetInputData $data): array;
    public function findById($id): array;
}
