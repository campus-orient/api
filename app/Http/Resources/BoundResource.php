<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->bound_id,
            'interestsPlace' => new InterestsPlaceResource($this->interestsPlace),
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
