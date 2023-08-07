<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ColorArticle;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log, Storage};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Article $article): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            if (key_exists('unpublish', $data)) {
                $data['is_published'] = !($data['unpublish'] === 'on');
                unset($data['unpublish']);
            } else $data['is_published'] = true;

            if (key_exists('preview_img', $data)) {
                if ($data['preview_img'] !== $article->preview_img) {
                    $previewImgPathName = Carbon::now()->timestamp . rand(10000000, 99999999) . '.' . $data['preview_img']->getClientOriginalExtension();
                    $data['preview_img'] = Storage::disk('public')->putFileAs('/images', $data['preview_img'], $previewImgPathName);

                    Storage::disk('public')->delete($article->preview_img);
                }
            }

            ArticleTag::where(['article_id' => $article->id])->each(function($position) { $position->delete(); });
            ColorArticle::where(['article_id' => $article->id])->each(function($position) { $position->delete(); });

            if (key_exists('tags', $data)) {
                foreach($data['tags'] as $tag) {
                    ArticleTag::create([
                        'tag_id' => $tag,
                        'article_id' => $article->id
                    ]);
                }
                unset($data['tags']);
            }

            if (key_exists('colors', $data)) {
                foreach($data['colors'] as $color) {
                    ColorArticle::create([
                        'color_id' => $color,
                        'article_id' => $article->id
                    ]);
                }
                unset($data['colors']);
            }

            $article->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('articles.show', $article);
    }
}
