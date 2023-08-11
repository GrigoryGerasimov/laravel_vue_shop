<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Models\ColorArticle;

final class StoreColorService
{
    public static function save(&$data): array|null
    {
        if (key_exists('colors', $data)) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
        }

        return $colorsIds ?? null;
    }

    public static function store(array $colorsIds, string $articleId): void
    {
        foreach ($colorsIds as $colorsId) {
            ColorArticle::create([
                'color_id' => $colorsId,
                'article_id' => $articleId
            ]);
        }
    }
}
