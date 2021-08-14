<?php

namespace App\Http\Controllers;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use App\Domains\Budgets\UseCases\NewBudgetUseCase;
use Illuminate\Http\Request;
use App\Domains\Auth\UseCases\LoginUseCase;
use App\Http\Resources\AuthLoginResource;

class AuthLoginController extends Controller
{
    public function __construct(protected LoginUseCase $useCase)
    {
    }

    public function __invoke(Request $request)
    {
        $response = $this->useCase->handle($request->input('email'), $request->input('password'));

        $object = (object) $response;

        return new AuthLoginResource($object);
    }
}
