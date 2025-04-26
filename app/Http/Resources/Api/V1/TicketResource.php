<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'user' => $this->user_id,
            'screening' => new ScreeningResource($this->whenLoaded('screening')),
            'seat' => new SeatResource($this->whenLoaded('seat')),
            'qr_code' => $this->qr_code,
            'status' => $this->status
        ];
    }
}
