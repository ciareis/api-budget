<?php

namespace App\Domains\Budgets\UseCases\Data;

use App\Domains\Budgets\Budget;
use Carbon\Carbon;

class BudgetInputData
{
    public $budget;

    public function __construct(
        protected array $customer,
        protected array $items,
        protected null|int $number = null,
        protected null|Carbon $date = null
    ) {
        $data = [
            'customer' => $customer,
            'items' => $items,
            'number' => $number,
            'date' => $date,
        ];

        Budget::isValid($data);

        $this->budget = new Budget($data);
    }

    public static function build(array $params)
    {
        if ($params['date'] ?? null) {
            $params['date'] = Carbon::parse($params['date']);
        }

        return new static(...$params);
    }

    public function toArray()
    {
        return \get_object_vars($this);
    }
}
