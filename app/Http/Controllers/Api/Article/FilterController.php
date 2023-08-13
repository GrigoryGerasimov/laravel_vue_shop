<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Http\Resources\Article\ArticleResourceWithGroup;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request): AnonymousResourceCollection
    {
        $filterParams = $request->validated();

        $filteredData = app()->make(ArticleFilter::class, ['queryParams' => $filterParams]);

        $filtered = Article::filter($filteredData)->get();

        return ArticleResourceWithGroup::collection($filtered);
    }
}
