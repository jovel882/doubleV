<?php

namespace App\JsonApi\V1\Tickets;

use LaravelJsonApi\Laravel\Http\Requests\ResourceQuery;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class TicketCollectionQuery extends ResourceQuery
{

    /**
     * Get the validation rules that apply to the request query parameters.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'fields' => [
                'nullable',
                'array',
                JsonApiRule::fieldSets(),
            ],
            'filter' => [
                'nullable',
                'array',
                JsonApiRule::filter(),
            ],
            'filter.id' => 'array',
            'filter.id.*' => 'integer',
            'filter.user' => 'array',
            'filter.status' => 'array',
            'filter.status.*' => [
                'in:abierto,cerrado'
            ],
            'include' => [
                'nullable',
                'string',
                JsonApiRule::includePaths(),
            ],
            'page' => [
                'nullable',
                'array',
                JsonApiRule::page(),
            ],
            'page.number' => ['integer', 'min:1'],
            'page.size' => ['integer', 'between:1,50'],
            'sort' => [
                'nullable',
                'string',
                JsonApiRule::sort(),
            ],
            'withCount' => [
                'nullable',
                'string',
                JsonApiRule::countable(),
            ],
        ];
    }
}
