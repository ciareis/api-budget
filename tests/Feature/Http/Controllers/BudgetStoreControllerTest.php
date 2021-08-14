<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class BudgetStoreControllerTest extends TestCase
{
    protected $inputData;

    public function test_should_new_budget()
    {
        $response = $this->postJson('api/organization/budget', $this->inputData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'customer' => [
                        'name',
                        'address' => [
                            'city',
                            'state'
                        ],
                    ],
                    'items' => [
                        '*' => [
                            'title',
                            'description',
                            'price',
                        ],
                    ],
                ],
            ]);
    }

    public function test_dont_repeat_number()
    {
    }

    public function test_returns_number()
    {
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->inputData = [
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
    }
}
