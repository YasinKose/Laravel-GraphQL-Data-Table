<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Posts',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => (Type::int()),
                'description' => 'Brings the id of the job',
            ],

            'title' => [
                'type' => (Type::string()),
                'description' => 'Brings the id of the job',
            ],

            'content' => [
                'type' => (Type::string()),
                'description' => 'Brings the id of the job',
            ]
        ];
    }
}
