<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InterestsPlaceCollection extends ResourceCollection
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
        return $this->collection->map(function ($interestsPlace) use ($request) {
            return (new InterestsPlaceResource($interestsPlace, $this->relationships))->toArray($request);
        })->toArray();
    }
}
