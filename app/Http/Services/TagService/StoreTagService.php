<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Models\ArticleTag;

final class StoreTagService
{
    public static function save(&$data): array|null
    {
        if (key_exists('tags', $data)) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }

        return $tagsIds ?? null;
    }

    public static function store(array $tagsIds, string $articleId): void
    {
        foreach ($tagsIds as $tagsId) {
            ArticleTag::create([
                'tag_id' => $tagsId,
                'article_id' => $articleId
            ]);
        }
    }
}
