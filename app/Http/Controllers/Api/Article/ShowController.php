<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResourceWithGroup;
use App\Models\Article;

class ShowController extends Controller
{
    /**
     * @param Article $article
     * @return ArticleResourceWithGroup
     */
    public function __invoke(Article $article): ArticleResourceWithGroup
    {
        return new ArticleResourceWithGroup($article);
    }
}
