<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'category' => 'nullable|array',
            'color' => 'nullable|array',
            'price' => 'nullable|array',
            'tag' => 'nullable|array',
            'itemsPerPage' => 'nullable|integer',
            'pageId' => 'nullable|integer',
            'col' => 'nullable|string',
            'dir' => 'nullable|string'
        ];
    }
}
