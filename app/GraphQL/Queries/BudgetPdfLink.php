<?php

namespace App\GraphQL\Queries;

class BudgetPdfLink
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($budget, array $args)
    {
        return route('budget.pdf', [
            'organization' => request()->segment(1),
            'tenant_id' => $budget->tenant_id,
            'budget' => $budget->id
        ]);
    }
}
