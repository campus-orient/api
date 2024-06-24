<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        $data = [
            'id' => $this->visit_id,
            'user' => new UserResource($this->user),
            'interestsPlace' => new InterestsPlaceResource($this->interestsPlace),
            'date' => $this->created_at->toDateString(),
            'time' => $this->created_at->toTimeString(),
        ];

        return $data;
    }
}
