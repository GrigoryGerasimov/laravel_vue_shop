<?php

declare(strict_types=1);

namespace App\Http\Services\TagService;

use App\Http\Services\AbstractUpdatingService;
use App\Models\ArticleTag;
use Illuminate\Database\Eloquent\Model;

final class UpdateTagService extends AbstractUpdatingService
{
    public static function dispatch(array &$data, Model $model): void
    {
        ArticleTag::where(['article_id' => $model->id])->each(function ($position) {
            $position->delete();
        });

        if (key_exists('tags', $data)) {
            foreach ($data['tags'] as $tag) {
                ArticleTag::create([
                    'tag_id' => $tag,
                    'article_id' => $model->id
                ]);
            }
            unset($data['tags']);
        }
    }
}
