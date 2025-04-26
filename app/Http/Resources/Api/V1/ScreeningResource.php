<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScreeningResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'film' => new FilmResource($this->whenLoaded('film')),
            'hall' => new HallResource($this->whenLoaded('hall')),
            'start_time' => $this->start_time,
            'price' => $this->price
        ];
    }
}
