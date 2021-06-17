<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Brings the id of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Brings the name of the user',
            ],

            'email' => [
                'type' => Type::string(),
                'description' => 'Brings the email of the user',
            ],
        ];
    }
}
