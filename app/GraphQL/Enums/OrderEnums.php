<?php

declare(strict_types=1);

namespace App\GraphQL\Enums;

use Rebing\GraphQL\Support\EnumType;

class OrderEnums extends EnumType
{
    protected $attributes = [
        'name' => 'orderEnum',
        'description' => 'Order direction types',
        'values' => [
            'ASC' => 'ASC',
            'DESC' => 'DESC',
        ],
    ];
}
