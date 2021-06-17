<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\InputType;

class OrderInput extends InputType
{
    protected $attributes = [
        'name' => 'orderInput',
        'description' => 'Variables for sorting',
    ];

    public function fields(): array
    {
        return [
            'direction' => [
                'name' => 'direction',
                'type' => GraphQL::type("orderEnum"),
                'description' => "Sorting direction"
            ],

            'column' => [
                'name' => 'column',
                'type' => Type::string(),
                'description' => "Column name for sorting"
            ],
        ];
    }
}
