<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\SearchRequest;
use App\Http\Resources\Article\ArticleResourceWithGroup;
use App\Models\Article;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request): ?ArticleResourceWithGroup
    {
        $data = $request->validated();
        $searchedTitle = $data['title'];

        $article = Article::query()->where('is_published', '=', true, 'and', 'title', 'like', "%$searchedTitle%")->first();

        return isset($article) ? new ArticleResourceWithGroup($article) : null;
    }
}
