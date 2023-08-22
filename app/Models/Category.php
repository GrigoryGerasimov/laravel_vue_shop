<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Collection, Model, Relations\HasMany, SoftDeletes};

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    /**
     * @return Collection
     */
    public function publishedArticles(): Collection
    {
        return $this->articles()->where(['is_published' => true])->get();
    }
}
