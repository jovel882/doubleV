<?php

namespace App\JsonApi\V1\Tickets;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class TicketRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user' => ['required', 'string'],
            'status' => ['required', 'in:abierto,cerrado'],
        ];
    }

}
