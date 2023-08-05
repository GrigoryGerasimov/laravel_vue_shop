<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Models\{Article, ArticleTag, ColorArticle};
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log, Storage};

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

            $previewImgPathName = Carbon::now()->timestamp . rand(10000000, 99999999) . '.' . $data['preview_img']->getClientOriginalExtension();
            $data['preview_img'] = Storage::disk('public')->putFileAs('/images', $data['preview_img'], $previewImgPathName);

            if (key_exists('tags', $data)) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }

            if (key_exists('colors', $data)) {
                $colorsIds = $data['colors'];
                unset($data['colors']);
            }

            $article = Article::firstOrCreate(['ean' => $data['ean']], $data);

            if (isset($tagsIds)) {
                foreach($tagsIds as $tagsId) {
                    ArticleTag::create([
                        'tag_id' => $tagsId,
                        'article_id' => $article->id
                    ]);
                }
            }

            if (isset($colorsIds)) {
                foreach($colorsIds as $colorsId) {
                    ColorArticle::create([
                        'color_id' => $colorsId,
                        'article_id' => $article->id
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($article) ? redirect()->route('articles.index') : redirect()->back();
    }
}
