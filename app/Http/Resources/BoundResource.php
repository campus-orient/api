<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoundResource extends JsonResource
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
            'id' => $this->bound_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];

        if (in_array('interestsPlace', $this->relationships)) $data['interestsPlace'] = new InterestsPlaceResource($this->interestsPlace);

        return $data;
    }
}
