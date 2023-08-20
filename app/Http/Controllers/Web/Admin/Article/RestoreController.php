<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\{Article, ArticleTag, ColorArticle};
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(Article $article): RedirectResponse
    {
        $isRestored = $article->restore();

        ArticleTag::withTrashed()->where(['article_id' => $article->id])->each(function($position) { $position->restore(); });
        ColorArticle::withTrashed()->where(['article_id' => $article->id])->each(function($position) { $position->restore(); });

        return $isRestored ? redirect()->route('articles.show', $article) : redirect()->back();
    }
}
