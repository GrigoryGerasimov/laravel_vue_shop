<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
            'age' => 'required|integer',
            'gender_id' => 'required|integer',
            'country_id' => 'required|integer',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'street_number' => 'required|string',
            'unit_number' => 'nullable|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'postal_code' => 'required|string',
            'address_country_id' => 'required|integer'
        ];
    }
}
