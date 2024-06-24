<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->user_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'type' => $this->type,
            'email' => $this->email,
            'status' => $this->status,
        ];

        if (auth('sanctum')->user()->type === 'admin')
            $data['password'] = 'defaults';


        if (in_array('logins', $this->relationships)) $data['logins'] = [
            'count' => count($this->logins),
            'records' => new UserLoginCollection($this->logins)
        ];

        if (in_array('visits', $this->relationships)) $data['visits'] = [
            'count' => count($this->visits),
            'records' => new VisitCollection($this->visits)
        ];

        return $data;
    }
}
