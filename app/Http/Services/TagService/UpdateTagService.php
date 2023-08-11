<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Models\ArticleTag;

final class UpdateTagService
{
    public static function dispatch(&$data, string $articleId): void
    {
        ArticleTag::where(['article_id' => $articleId])->each(function ($position) {
            $position->delete();
        });

        if (key_exists('tags', $data)) {
            foreach ($data['tags'] as $tag) {
                ArticleTag::create([
                    'tag_id' => $tag,
                    'article_id' => $articleId
                ]);
            }
            unset($data['tags']);
        }
    }
}
