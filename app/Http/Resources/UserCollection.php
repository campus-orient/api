<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    protected $relationships;

    public function __construct($resource, $relationships = [])
    {
        parent::__construct($resource);
        $this->relationships = $relationships;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($user) use ($request) {
            return (new UserResource($user, $this->relationships))->toArray($request);
        })->toArray();
    }
}
