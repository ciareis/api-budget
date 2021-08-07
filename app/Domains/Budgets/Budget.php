<?php

namespace App\Domains\Budgets;

use App\Domains\Model;
use Exception;
use Illuminate\Support\Facades\Validator;

class Budget extends Model
{
    public $fillable = [
        'customer',
        'items',
        'number',
        'date',
    ];

    protected $casts = [
        'customer' => 'json',
        'items' => 'array',
        'number' => 'integer',
        'date' => 'date',
    ];

    public static function isValid(array $attributes)
    {
        $validator = Validator::make($attributes, [
            'customer' => [
                 'required',
                 'array',
            ],
             'customer.name' => [
                 'required',
                 'string',
                 'min:3',
                 'max:45'
            ],
             'customer.address' => [
                 'required',
                 'array',
             ],
            'customer.address.city' => [
                'required',
                'string',
                'min:2',
                'max:45'
            ],
            'customer.address.state' => [
                'required',
                'string',
                'size:2',
            ],
            'number' => [
                'sometimes',
                'nullable',
                'integer',
            ],
            'date' => [
                'sometimes',
                'nullable',
                'date',
            ],

            'items' => [
                'required',
                'array',
            ],
            'items.*.description' => [
                'required',
                'min:5',
            ],
            'items.*.title' => [
                'sometimes',
                'nullable',
                'string',
                'min:5',
                'max:60',
            ],
            'items.*.price' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:1',
            ],
        ]);

        if (!$validator->passes()) {
            throw new Exception($validator->errors());
        }

        return true;
    }
}
