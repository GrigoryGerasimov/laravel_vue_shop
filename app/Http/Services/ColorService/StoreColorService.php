<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Http\Services\AbstractMetaEntityStoringService;
use App\Models\ColorArticle;
use Illuminate\Database\Eloquent\Model;

final class StoreColorService extends AbstractMetaEntityStoringService
{
    public static function save(array &$data): array|null
    {
        if (key_exists('colors', $data)) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
        }

        return $colorsIds ?? null;
    }

    public static function store(array $ids, Model $model): void
    {
        foreach ($ids as $colorsId) {
            ColorArticle::create([
                'color_id' => $colorsId,
                'article_id' => $model->id
            ]);
        }
    }
}
