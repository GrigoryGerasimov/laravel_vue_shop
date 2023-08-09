<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Collection, Model, Relations\BelongsTo, Relations\BelongsToMany, SoftDeletes};

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        return url('storage/' . $this->preview_img);
    }

    /**
     * @return Collection
     */
    public function getActiveTagsAttribute(): Collection
    {
        return $this->tags()->where(['article_tags.deleted_at' => null])->get();
    }

    /**
     * @return Collection
     */
    public function getActiveColorsAttribute(): Collection
    {
        return $this->colors()->where(['color_articles.deleted_at' => null])->get();
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id', 'id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_articles', 'article_id', 'color_id', 'id', 'id');
    }
}
