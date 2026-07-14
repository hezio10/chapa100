<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowBusLineResource extends JsonResource
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
            'serviceType' => $this->serviceType,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'transportType' => $this->transportType,
            'pricings' => $this->pricings,
        ];
    }
}
