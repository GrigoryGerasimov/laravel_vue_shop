<?php

declare(strict_types=1);

namespace App\Http\Services\ImageService;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;

final class DestroyImageService
{
    public static function dispatch(Article $article): void
    {
        if (Storage::disk('public')->exists($article->preview_img)) {
            Storage::disk('public')->delete($article->preview_img);
        }

        foreach ($article->images as $articleImage) {
            if (Storage::disk('public')->exists($articleImage->img_path)) {
                $articleImage->delete();
                Storage::disk('public')->delete($articleImage->img_path);
            }
        }
    }
}
