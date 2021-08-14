<?php

namespace Tests\Feature\GraphQL\Mutations;

use Tests\TestCase;

class NewBudgetTest extends TestCase
{
    protected $inputData;

    public function test_should_returns_budget()
    {
        $response = $this->graphQL(/** @lang GraphQL */ '
            mutation newBudget($input: NewBudgetInput!) {
                newBudget(input: $input) {
                  id
                  number
                  date
                }
              }
        ', [
            'input' => $this->inputData
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'newBudget' => [
                        'id',
                        'number',
                        'date'
                    ]
                ]
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
            'date' => now()->format('Y-m-d'),
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
                ///[
                ///    'title' => 'Desenvolvimento do Sistema de Orçamento',
                ///    'description' => 'Orçamento terá x, y e z.',
                ///    'price' => 1000000,
                ///],
            ],
        ];
    }
}
