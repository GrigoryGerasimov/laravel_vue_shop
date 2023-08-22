<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResourceWithGroup;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $articlesList = Article::query()->where(['is_published' => true])->get();

        return ArticleResourceWithGroup::collection($articlesList);
    }
}
