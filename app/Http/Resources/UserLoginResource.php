<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
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
            'id' => $this->user_login_id,
            'name' => $this->user->name,
            'surname' => $this->user->surname,
            'email' => $this->user->email,
            'timestamp' => $this->created_at->diffForHumans(),
        ];
    }
}
