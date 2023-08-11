<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Models\ColorArticle;

final class UpdateColorService
{
    public static function dispatch(&$data, string $articleId): void
    {
        ColorArticle::where(['article_id' => $articleId])->each(function ($position) {
            $position->delete();
        });

        if (key_exists('colors', $data)) {
            foreach ($data['colors'] as $color) {
                ColorArticle::create([
                    'color_id' => $color,
                    'article_id' => $articleId
                ]);
            }
            unset($data['colors']);
        }
    }
}
