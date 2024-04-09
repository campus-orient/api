<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'id' => $this->login_id,
            'time'=> $this->created_at->toTimeString(),
            'date'=> $this->created_at->toDateString(),
            'user' => new UserResource($this->user)
        ];
    }
}
