<?php

declare(strict_types=1);

namespace App\Http\Services\ImageService;

use App\Models\{Image, ImageType};
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

final class StoreImageService
{
    public static function save(&$data): array
    {
        $imgBaseName = Carbon::now()->timestamp . rand(10000000, 99999999);
        $previewImgPathName = $imgBaseName . '.' . $data['preview_img']->getClientOriginalExtension();

        $data['preview_img'] = Storage::disk('public')->putFileAs('/images/' . $imgBaseName, $data['preview_img'], $previewImgPathName);

        $articleImgTypes = ImageType::all()->pluck('title')->toArray();
        $articleImgs = [];
        array_walk($articleImgTypes, function ($articleImgType) use ($imgBaseName, $previewImgPathName, &$data, &$articleImgs) {
            $articleImgs[$articleImgType] = Storage::disk('public')->putFileAs('/images/' . $imgBaseName, $data[$articleImgType], $articleImgType . '_' . $previewImgPathName);
            unset($data[$articleImgType]);
        });

        return $articleImgs;
    }

    public static function store(array $articleImgs, string $articleId): void
    {
        foreach ($articleImgs as $articleImgType => $articleImg) {
            $articleImageType = ImageType::firstOrCreate(['title' => $articleImgType]);

            Image::create([
                'img_type_id' => $articleImageType->id,
                'img_path' => $articleImg,
                'article_id' => $articleId
            ]);
        }
    }
}
