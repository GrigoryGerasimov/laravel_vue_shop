<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'description' => $this->description,
            'ean' => $this->ean,
            'content' => $this->content,
            'preview_img' => $this->imageUrl,
            'previous_price' => $this->previous_price,
            'purchase_price' => $this->purchase_price,
            'recommended_retail_price' => $this->recommended_retail_price,
            'total_amount' => $this->total_amount,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            'colors' => ColorResource::collection($this->colors),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
