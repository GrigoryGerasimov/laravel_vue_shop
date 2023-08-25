<?php

declare(strict_types=1);

namespace App\Http\Services\ColorService;

use App\Http\Services\AbstractDestroyingService;
use App\Models\ColorArticle;
use Illuminate\Database\Eloquent\Model;

final class DestroyColorService extends AbstractDestroyingService
{
    public static function dispatch(Model $model): void
    {
        ColorArticle::where(['article_id' => $model->id])->each(function ($position) {
            $position->delete();
        });
    }
}
