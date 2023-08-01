<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => 'required|string|unique:colors,title',
            'hex' => [
                'required',
                'string',
                Rule::unique('colors', 'hex'),
                'regex:/^([a-zA-Z0-9]{3}|[a-zA-Z0-9]{6})$/'
            ]
        ];
    }
}
