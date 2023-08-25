<?php

namespace App\Http\Resources\Address;

use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'street_nr' => $this->street_number,
            'unit_nr' => $this->unit_nr,
            'city' => $this->city,
            'region' => $this->region,
            'postal_code' => $this->postal_code,
            'address_country' => new CountryResource($this->country)
        ];
    }
}
