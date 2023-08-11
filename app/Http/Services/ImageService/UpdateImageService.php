<?php

declare(strict_types=1);

namespace App\Http\Services\ImageService;

use App\Models\{Article, Image, ImageType};
use Illuminate\Support\Facades\Storage;

final class UpdateImageService
{
    public static function dispatch(&$data, Article $article): void
    {
        $articleImgs = [];

        preg_match('/\/(\d+)\//', $article->preview_img, $matches);

        if (isset($matches[1])) {
            $existingImgName = $matches[1];
        }

        if (isset($existingImgName) && Storage::directoryExists('public/images/' . $existingImgName)) {
            $newImgName = $existingImgName . '_' . time();

            if (key_exists('preview_img', $data)) {
                Storage::disk('public')->delete($article->preview_img);
                $data['preview_img'] = Storage::disk('public')->putFileAs('/images/' . $existingImgName, $data['preview_img'], $newImgName . '.' . $data['preview_img']->getClientOriginalExtension());
            }

            $articleImgTypes = ImageType::all()->pluck('title')->toArray();

            foreach($articleImgTypes as $articleImgType) {
                if (key_exists($articleImgType, $data)) {
                    $currentArticleImage = $article->images()->where(['img_type_id' => ImageType::where(['title' => $articleImgType])->first()->id])->first();
                    if (isset($currentArticleImage)) {
                        $currentArticleImage->delete();
                        Storage::disk('public')->delete($currentArticleImage->img_path);
                    }
                    $articleImgs[$articleImgType] = Storage::disk('public')->putFileAs('/images/' . $existingImgName, $data[$articleImgType], $articleImgType . '_' . $newImgName . '.' . $data[$articleImgType]->getClientOriginalExtension());
                    unset($data[$articleImgType]);
                }
            }
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

    }
}
