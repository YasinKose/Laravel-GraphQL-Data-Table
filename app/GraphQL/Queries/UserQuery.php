<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends PaginationQuery
{
    public function __construct()
    {
        $this->selectModel(new User());
    }

    protected $attributes = [
        'name' => 'user',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('User');
    }
}
