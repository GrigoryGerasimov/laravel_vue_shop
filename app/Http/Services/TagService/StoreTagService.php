<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Http\Services\AbstractMetaEntityStoringService;
use App\Models\ArticleTag;
use Illuminate\Database\Eloquent\Model;

final class StoreTagService extends AbstractMetaEntityStoringService
{
    public static function save(array &$data): array|null
    {
        if (key_exists('tags', $data)) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }

        return $tagsIds ?? null;
    }

    public static function store(array $ids, Model $model): void
    {
        foreach ($ids as $tagsId) {
            ArticleTag::create([
                'tag_id' => $tagsId,
                'article_id' => $model->id
            ]);
        }
    }
}
