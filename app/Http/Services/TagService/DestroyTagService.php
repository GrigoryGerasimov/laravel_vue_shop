<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Models\ArticleTag;

final class DestroyTagService
{
    public static function dispatch(string $articleId): void
    {
        ArticleTag::where(['article_id' => $articleId])->each(function ($position) {
            $position->delete();
        });
    }
}
