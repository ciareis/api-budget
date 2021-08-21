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
        $data = $args;
        unset($data['tenantId']);
        $tenantId = $args['tenantId'];

        \Log::info([
            // 'args' => $args,
            'data' => $data,
            'tenantId' => $tenantId
        ]);

        $inputData = BudgetInputData::build($data);
        $useCase = new NewBudgetUseCase($tenantId, $inputData, $this->repository);

        $response = $useCase->handle();

        return $response;
    }
}
