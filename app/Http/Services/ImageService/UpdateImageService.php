<?php

declare(strict_types=1);

namespace App\Http\Services\ImageService;

use App\Http\Services\AbstractUpdatingService;
use App\Models\{Image, ImageType};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

final class UpdateImageService extends AbstractUpdatingService
{
    public static function dispatch(array &$data, Model $model): void
    {
        $articleImgs = [];

        preg_match('/\/(\d+)\//', $model->preview_img, $matches);

        if (isset($matches[1])) {
            $existingImgName = $matches[1];
        }

        if (isset($existingImgName) && Storage::directoryExists('public/images/' . $existingImgName)) {
            $newImgName = $existingImgName . '_' . time();

            if (key_exists('preview_img', $data)) {
                Storage::disk('public')->delete($model->preview_img);
                $data['preview_img'] = Storage::disk('public')->putFileAs('/images/' . $existingImgName, $data['preview_img'], $newImgName . '.' . $data['preview_img']->getClientOriginalExtension());
            }

            $articleImgTypes = ImageType::all()->pluck('title')->toArray();

            foreach($articleImgTypes as $articleImgType) {
                if (key_exists($articleImgType, $data)) {
                    $currentArticleImage = $model->images()->where(['img_type_id' => ImageType::where(['title' => $articleImgType])->first()->id])->first();
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
                    'article_id' => $model->id
                ]);
            }
        }

    }
}
