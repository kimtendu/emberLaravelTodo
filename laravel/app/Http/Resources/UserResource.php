<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array
     * @param Request $request
     * @return arrays
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'tasks' => TaskResource::collection($this->tasks)
        ];
    }
}
