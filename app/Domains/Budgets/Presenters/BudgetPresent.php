<?php

namespace App\Domains\Budgets\Presenters;

use App\Domains\Budgets\Budget;

class BudgetPresent
{
    public function __construct(protected Budget $budget)
    {
    }

    public function number()
    {
        $number = $this->budget->number;
        $year = $this->budget->date->format('Y');

        return "${number}/${year}";
    }

    public function date()
    {
        $months = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro',
        ];

        $day = $this->budget->date->format('d');
        $month = $months[$this->budget->date->format('m')];
        $year = $this->budget->date->format('Y');

        return "${day} de ${month} de ${year}";
    }

    public function __get($method)
    {
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        return $this->budget->$method;
    }
}
