<?php

namespace App\Http\Requests\Article;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'ean' => 'required|string|max:13|unique:articles,ean',
            'content' => 'nullable|string',
            'preview_img' => 'required|image',
            'purchase_price' => 'required|decimal:2',
            'recommended_retail_price' => 'required|decimal:2',
            'total_amount' => 'required|integer',
            'category_id' => 'required|integer',
            'group_id' => 'required|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array'
        ];
    }
}
