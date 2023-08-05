<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\{Article, ArticleTag, ColorArticle};
use Illuminate\Support\Facades\{DB, Log, Storage};
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(Article $article): RedirectResponse
    {
        try {
            DB::beginTransaction();

            Storage::disk('public')->delete($article->preview_img);

            ArticleTag::where(['article_id' => $article->id])->each(function($position) { $position->delete(); });
            ColorArticle::where(['article_id' => $article->id])->each(function($position) { $position->delete(); });

            $isDeleted = $article->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('articles.index') : redirect()->back();
    }
}
