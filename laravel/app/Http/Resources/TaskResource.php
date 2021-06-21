<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;


class TaskResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d/m/y H:i'),
            'done' => $this->done,
        ];
    }
}
