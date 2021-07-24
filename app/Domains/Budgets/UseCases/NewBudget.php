<?php

namespace App\Domains\Budgets\UseCases;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;

class NewBudget
{
    public function __construct(
        protected BudgetInputData $inputData,
        protected BudgetRepositoryContract $repository
    ) {
    }

    public function handle()
    {
        $output = $this->repository->saveBudget($this->inputData);

        return (object) $output;
    }
}
