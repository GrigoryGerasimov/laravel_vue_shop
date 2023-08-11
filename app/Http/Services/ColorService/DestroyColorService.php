<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Models\ColorArticle;

final class DestroyColorService
{
    public static function dispatch(string $articleId): void
    {
        ColorArticle::where(['article_id' => $articleId])->each(function ($position) {
            $position->delete();
        });
    }
}
