<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Post;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

abstract class PaginationQuery extends Query
{
    /**
     * @var Model
     */
    private $model;

    final function args(): array
    {
        return [
            'search' => [
                'name' => 'search',
                'type' => GraphQL::type("searchInput"),
                'description' => "Search params"
            ],

            'orderBy' => [
                'name' => 'orderBy',
                'type' => GraphQL::type("orderInput"),
                'description' => "Order params"
            ],

            'page' => [
                'name' => 'page',
                'type' => Type::int(),
                'description' => "Current page number"
            ],

            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
                'description' => "Per page row limit"
            ],
        ];
    }

    final function selectModel(Model $model)
    {
        $this->model = $model;
    }

    final function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();

        $args['page'] = $args['page'] ?? 1;
        $args['limit'] = $args['limit'] ?? 10;
        $args['limit'] = $args['limit'] <= 100 && $args['limit'] >= 10 ? $args['limit'] : 10;
        $args['search']['column'] = !empty($args['search']['column']) ? $args['search']['column'] : ' * ';

        $model = ($this->model)::select($select);

        if (!empty($args['search']['text']) && $args['search']['column'] == "*") {
            $model->orWhere(collect($select)->crossJoin(['like'], ["%" . $args['search']['text'] . "%"])->toArray());
        } elseif (!empty($args['search']['text'])) {
            $model->where($args['search']['column'], "like", "%" . $args['search']['text'] . "%");
        }

        if (isset($args['orderBy']['column']) && !empty($args['orderBy']['column'])) {
            $args['orderBy']['direction'] = $args['orderBy']['direction'] ?? "ASC";

            $model->orderBy($args['orderBy']['column'], $args['orderBy']['direction']);
        }

        return $model->paginate($args['limit'], [' * '], 'page', $args['page']);
    }
}
