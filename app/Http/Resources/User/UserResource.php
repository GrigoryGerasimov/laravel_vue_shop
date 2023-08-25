<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Gender\GenderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'gender' => new GenderResource($this->gender),
            'country' => new CountryResource($this->country),
            'address' => new AddressResource($this->address)
        ];
    }
}
