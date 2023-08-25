<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Http\Services\AbstractUpdatingService;
use App\Models\ColorArticle;
use Illuminate\Database\Eloquent\Model;

final class UpdateColorService extends AbstractUpdatingService
{
    public static function dispatch(array &$data, Model $model): void
    {
        ColorArticle::where(['article_id' => $model->id])->each(function ($position) {
            $position->delete();
        });

        if (key_exists('colors', $data)) {
            foreach ($data['colors'] as $color) {
                ColorArticle::create([
                    'color_id' => $color,
                    'article_id' => $model->id
                ]);
            }
            unset($data['colors']);
        }
    }
}
