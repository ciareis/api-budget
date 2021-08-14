<?php

namespace App\Http\Controllers;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use App\Domains\Budgets\UseCases\NewBudgetUseCase;
use Illuminate\Http\Request;

class BudgetStoreController extends Controller
{
    public function __construct(protected BudgetRepositoryContract $repository)
    {
    }

    public function __invoke(Request $request)
    {
        $inputData = BudgetInputData::build($request->all());
        $useCase = new NewBudgetUseCase($inputData, $this->repository);
        $response = $useCase->handle();

        return $response;
    }
}
