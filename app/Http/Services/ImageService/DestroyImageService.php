<?php

declare(strict_types=1);

namespace App\Http\Services\ImageService;

use App\Http\Services\AbstractDestroyingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

final class DestroyImageService extends AbstractDestroyingService
{
    public static function dispatch(Model $model): void
    {
        if (Storage::disk('public')->exists($model->preview_img)) {
            Storage::disk('public')->delete($model->preview_img);
        }

        foreach ($model->images as $articleImage) {
            if (Storage::disk('public')->exists($articleImage->img_path)) {
                $articleImage->delete();
                Storage::disk('public')->delete($articleImage->img_path);
            }
        }
    }
}
