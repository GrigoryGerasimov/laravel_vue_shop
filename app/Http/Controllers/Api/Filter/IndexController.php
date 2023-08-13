<?php

namespace App\Http\Controllers\Api\Filter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Tag\TagResource;
use App\Models\{Article, Category, Color, Tag};

class IndexController extends Controller
{
    public function __invoke(): array
    {
        $categoriesList = Category::all();
        $colorsList = Color::all();
        $tagsList = Tag::all();
        $pricesList = Article::all()->pluck('recommended_retail_price')->toArray();

        return [
            'categories' => CategoryResource::collection($categoriesList),
            'colors' => ColorResource::collection($colorsList),
            'prices' => $pricesList,
            'tags' => TagResource::collection($tagsList)
        ];
    }
}
