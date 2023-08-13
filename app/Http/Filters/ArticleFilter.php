<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

final class ArticleFilter extends AbstractFilter
{
    protected const CATEGORY = 'category';
    protected const COLOR = 'color';
    protected const PRICE = 'price';
    protected const TAG = 'tag';

    public function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'categories'],
            self::COLOR => [$this, 'colors'],
            self::PRICE => [$this, 'prices'],
            self::TAG => [$this, 'tags']
        ];
    }

    protected function categories(Builder $builder, $value): Builder
    {
        return $builder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value): Builder
    {
        return $builder->whereHas('colors', function ($subBuilder) use ($value) {
            return $subBuilder->whereIn('color_id', $value);
        });
    }

    protected function prices(Builder $builder, $value): Builder
    {
        return $builder->whereBetween('recommended_retail_price', $value);
    }

    protected function tags(Builder $builder, $value): Builder
    {
        return $builder->whereHas('tags', function ($subBuilder) use ($value) {
            return $subBuilder->whereIn('tag_id', $value);
        });
    }
}
