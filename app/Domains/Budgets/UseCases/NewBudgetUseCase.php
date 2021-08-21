<?php

namespace App\Domains\Budgets\UseCases;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;

class NewBudgetUseCase
{
    public function __construct(
        protected string $tenantId,
        protected BudgetInputData $inputData,
        protected BudgetRepositoryContract $repository
    ) {
    }

    public function handle()
    {
        $output = $this->repository->saveBudget(
            $this->tenantId,
            $this->inputData
        );

        return (object) $output;
    }
}
