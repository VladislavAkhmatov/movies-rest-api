<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'duration_minute' => $this->duration_minute,
            'poster_url' => $this->poster_url,
            'release_date' => $this->release_date,
            'genres_ids' => GenreResource::collection($this->whenLoaded('genres')),
        ];
    }
}
