<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\{Article, ArticleTag, ColorArticle, Image, ImageType};
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




            preg_match('/\/(\d+)\//', $article->preview_img, $matches);

            if (isset($matches[1])) {
                $existingImgName = $matches[1];
            }

            if (isset($existingImgName) && Storage::directoryExists('public/images/' . $existingImgName)) {
                if (key_exists('preview_img', $data)) {
                    Storage::disk('public')->delete($article->preview_img);
                    $data['preview_img'] = Storage::disk('public')->putFileAs('/images/' . $existingImgName, $data['preview_img'], $existingImgName . '.' . $data['preview_img']->getClientOriginalExtension());
                }

                $articleImgTypes = ImageType::all();
                $articleImgs = [];
                foreach($articleImgTypes as $articleImgType) {
                    if (key_exists($articleImgType->title, $data)) {
                        $currentArticleImage = $article->images()->where(['img_type_id' => ImageType::where(['title' => $articleImgType->title])->first()->id])->first();
                        Storage::disk('public')->delete($currentArticleImage->img_path);
                        $articleImgs[$articleImgType->title] = Storage::disk('public')->putFileAs('/images/' . $existingImgName, $data[$articleImgType->title], $articleImgType->title . '_' . $existingImgName . '.' . $data[$articleImgType->title]->getClientOriginalExtension());
                        unset($data[$articleImgType->title]);
                    }
                }
            }




            ArticleTag::where(['article_id' => $article->id])->each(function ($position) {
                $position->delete();
            });
            ColorArticle::where(['article_id' => $article->id])->each(function ($position) {
                $position->delete();
            });

            if (key_exists('tags', $data)) {
                foreach ($data['tags'] as $tag) {
                    ArticleTag::create([
                        'tag_id' => $tag,
                        'article_id' => $article->id
                    ]);
                }
                unset($data['tags']);
            }

            if (key_exists('colors', $data)) {
                foreach ($data['colors'] as $color) {
                    ColorArticle::create([
                        'color_id' => $color,
                        'article_id' => $article->id
                    ]);
                }
                unset($data['colors']);
            }


            if (!empty($articleImgs)) {
                foreach ($articleImgs as $articleImgType => $articleImg) {
                    $articleImageType = ImageType::firstOrCreate(['title' => $articleImgType]);

                    Image::firstOrCreate(['img_path' => $articleImg], [
                        'img_type_id' => $articleImageType->id,
                        'img_path' => $articleImg,
                        'article_id' => $article->id
                    ]);
                }
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
