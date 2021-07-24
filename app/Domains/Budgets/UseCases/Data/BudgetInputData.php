<?php

namespace App\Domains\Budgets\UseCases\Data;

use Carbon\Carbon;

class BudgetInputData
{
    public function __construct(
        protected array $customer,
        protected array $items,
        protected null|int $number = null,
        protected null|Carbon $date = null
    ) {
    }

    public static function build(array $params)
    {
        return new static(...$params);
    }

    public function toArray()
    {
        return \get_object_vars($this);
    }
}
