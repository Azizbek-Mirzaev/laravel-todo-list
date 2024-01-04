<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * App/Models/Task $resource
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->resource->id, //
            "name" => $this->resource->name, //Шаблон что и как надо возвращать
            'description' => $this->resource->description //Шаблон что и как надо возвращать
        ];
    }
}
