<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'reservation_user' => $this->reservation_user,
            'reservation_parking' => $this->reservation_parking,
            'reservation_date' => $this->reservation_date,
            'reservation_start' => $this->reservation_start,
            'reservation_end' => $this->reservation_end,
        ];
    }
}
