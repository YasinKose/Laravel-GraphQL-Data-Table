<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PostsQuery extends PaginationQuery
{
    public function __construct()
    {
        $this->selectModel(new Post());
    }

    protected $attributes = [
        'name' => 'posts',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Posts');
    }
}
