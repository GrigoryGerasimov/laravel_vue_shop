<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Article\ArticleResourceForCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'title' => $this->title,
            'preview_img' => $this->publishedArticles()->first()->imageUrl,
            'articles' => ArticleResourceForCategory::collection($this->publishedArticles())
        ];
    }
}
