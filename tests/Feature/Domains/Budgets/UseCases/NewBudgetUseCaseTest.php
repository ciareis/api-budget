<?php

use App\Domains\Budgets\Repositories\BudgetRepositoryMemory;
use App\Domains\Budgets\Repositories\BudgetRepositoryPostgres;
use App\Domains\Budgets\UseCases\Data\BudgetInputData;
use App\Domains\Budgets\UseCases\NewBudgetUseCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

$tenantId = Str::uuid()->toString();

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

test("new budget", function () use ($inputData, $tenantId) {
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($tenantId, $data, $repository);
    $output = $service->handle();

    $budget = $repository->findById($tenantId, $output->id);

    expect($budget->id)->not()->toBeEmpty();
});

test("dont repeat number", function () use ($inputData, $tenantId) {
    // prepare
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();
    $repository->saveBudget($tenantId, $data);

    $service = new NewBudgetUseCase($tenantId, $data, $repository);
    $service->handle();
})->throws(Exception::class, 'Número existente. Tente outro número.');

test("returns number", function () use ($inputData, $tenantId) {
    // prepare
    unset($inputData['number']);
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($tenantId, $data, $repository);
    $output = $service->handle();

    expect($output->number)->toEqual(1);
});

test("should returns same tenant Id", function () use ($inputData, $tenantId) {
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($tenantId, $data, $repository);
    $output = $service->handle();

    $budget = $repository->findById($tenantId, $output->id);

    expect($budget->tenant_id)->toEqual($tenantId);
});

test("should not returns empty when tenantId is not exists", function () use ($inputData, $tenantId) {
    $data = BudgetInputData::build($inputData);
    $repository = new BudgetRepositoryPostgres();

    $service = new NewBudgetUseCase($tenantId, $data, $repository);
    $output = $service->handle();

    $tenantId2 = Str::uuid()->toString();

    $budget = $repository->findById($tenantId2, $output->id);

    expect($budget)->toBeEmpty();
});
