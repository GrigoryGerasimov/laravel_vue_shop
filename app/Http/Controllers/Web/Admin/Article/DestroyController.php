<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Services\ColorService\DestroyColorService;
use App\Http\Services\ImageService\DestroyImageService;
use App\Http\Services\TagService\DestroyTagService;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

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

            DestroyImageService::dispatch($article);
            DestroyTagService::dispatch($article);
            DestroyColorService::dispatch($article);

            $isDeleted = $article->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('articles.index') : redirect()->back();
    }
}
