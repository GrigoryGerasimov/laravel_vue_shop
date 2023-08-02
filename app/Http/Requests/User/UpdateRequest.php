<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'password' => 'required|string',
            'age' => 'required|integer',
            'gender_id' => 'required|integer',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'street_number' => 'required|string',
            'unit_number' => 'nullable|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'postal_code' => 'required|string',
            'country_id' => 'required|integer'
        ];
    }
}
