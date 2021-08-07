<?php

namespace App\GraphQL\Mutations;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use App\Domains\Budgets\UseCases\NewBudgetUseCase;

class NewBudget
{
    public function __construct(protected BudgetRepositoryContract $repository)
    {
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        \Log::info(['args' => $args]);
        $inputData = BudgetInputData::build($args);
        $useCase = new NewBudgetUseCase($inputData, $this->repository);

        $response = $useCase->handle();

        return $response;
    }
}
