<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Models\{Article, ArticleTag, ColorArticle};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log, Storage};

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

            if (Storage::disk('public')->exists($article->preview_img)) {
                Storage::disk('public')->delete($article->preview_img);
            }

            foreach ($article->images as $articleImage) {
                if (Storage::disk('public')->exists($articleImage->img_path)) {
                    Storage::disk('public')->delete($articleImage->img_path);
                }
            }

            ArticleTag::where(['article_id' => $article->id])->each(function ($position) {
                $position->delete();
            });
            ColorArticle::where(['article_id' => $article->id])->each(function ($position) {
                $position->delete();
            });

            $isDeleted = $article->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('articles.index') : redirect()->back();
    }
}
