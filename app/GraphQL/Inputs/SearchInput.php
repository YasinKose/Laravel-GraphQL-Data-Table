<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class SearchInput extends InputType
{
    protected $attributes = [
        'name' => 'searchInput',
        'description' => 'Variables for search',
    ];

    public function fields(): array
    {
        return [
            'text' => [
                'name' => 'text',
                'type' => Type::string(),
                'description' => 'Search term',
            ],

            'column' => [
                'name' => 'column',
                'type' => Type::string(),
                'description' => 'Search column',
            ],
        ];
    }
}
