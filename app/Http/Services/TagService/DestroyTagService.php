<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Http\Services\AbstractDestroyingService;
use App\Models\ArticleTag;
use Illuminate\Database\Eloquent\Model;

final class DestroyTagService extends AbstractDestroyingService
{
    public static function dispatch(Model $model): void
    {
        ArticleTag::where(['article_id' => $model->id])->each(function ($position) {
            $position->delete();
        });
    }
}
