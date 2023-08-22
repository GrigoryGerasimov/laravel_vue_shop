<?php

namespace App\Http\Requests\Article;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'ean' => [
                'required',
                'string',
                'max:13',
                Rule::unique('articles', 'ean')->ignore($this->route('article'))
            ],
            'content' => 'nullable|string',
            'preview_img' => 'nullable|image',
            'article_img_1' => 'nullable|image',
            'article_img_2' => 'nullable|image',
            'article_img_3' => 'nullable|image',
            'previous_price' => 'nullable|decimal:2',
            'purchase_price' => 'required|decimal:2',
            'recommended_retail_price' => 'required|decimal:2',
            'total_amount' => 'required|integer',
            'is_published' => 'nullable|string',
            'category_id' => 'required|integer',
            'size_scale_id' => 'nullable|integer',
            'group_id' => 'required|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array'
        ];
    }
}
