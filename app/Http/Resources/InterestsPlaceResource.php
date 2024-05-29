<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterestsPlaceResource extends JsonResource
{
    protected $relationships;

    public function __construct($resource, $relationships = [])
    {
        parent::__construct($resource);
        $this->relationships = $relationships;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        $data = [
            'id' => $this->interests_place_id,
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'createDate' => $this->created_at->toDateString(),
        ];

        if (in_array('bounds', $this->relationships)) {
            $data['bounds'] = new BoundCollection($this->bounds, ['interestsPlace']);
        }

        return $data;
    }
}
