<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Services\ColorService\StoreColorService;
use App\Http\Services\ImageService\StoreImageService;
use App\Http\Services\TagService\StoreTagService;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $articleImgs = StoreImageService::save($data);
            $tagsIds = StoreTagService::save($data);
            $colorsIds = StoreColorService::save($data);

            $article = Article::firstOrCreate(['ean' => $data['ean']], $data);

            if (!is_null($tagsIds)) {
                StoreTagService::store($tagsIds, $article->id);
            }
            if(!is_null($colorsIds)) {
                StoreColorService::store($colorsIds, $article->id);
            }
            if(!empty($articleImgs)) {
                StoreImageService::store($articleImgs, $article->id);
            }

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($article) ? redirect()->route('articles.index') : redirect()->back();
    }
}
