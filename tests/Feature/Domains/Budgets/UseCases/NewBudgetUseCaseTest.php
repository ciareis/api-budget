<?php

use App\Domains\Budgets\Repositories\BudgetRepositoryMemory;
use App\Domains\Budgets\Repositories\BudgetRepositoryPostgres;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use App\Domains\Budgets\UseCases\NewBudgetUseCase;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

$inputData = [
    'number' => 10,
    'date' => now(),
    'customer' => [
        // 'id' => '',
        'name' => 'Leandro Henrique',
        'address' => [
            'city' => 'Curitiba',
            'state' => 'PR'
        ],
    ],
    'items' => [
        [
            'title' => 'Consultoria',
            'description' => 'Consultoria para a empresa Emtudo',
            'price' => 200000
        ],
        [
            'title' => 'Desenvolvimento do Sistema de Orçamento',
            'description' => 'Orçamento terá x, y e z.',
            'price' => 1000000,
        ],
    ],
];

test("new budget", function () use ($inputData) {
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($data, $repository);
    $output = $service->handle();

    $budget = $repository->findById($output->id);

    expect(Uuid::isValid($budget->id))->toBeTrue();
});

test("dont repeat number", function () use ($inputData) {
    // prepare
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();
    $repository->saveBudget($data);

    $service = new NewBudgetUseCase($data, $repository);
    $service->handle();
})->throws(Exception::class, 'Número existente. Tente outro número.');

test("returns number", function () use ($inputData) {
    // prepare
    unset($inputData['number']);
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($data, $repository);
    $output = $service->handle();

    expect($output->number)->toEqual(1);
});
