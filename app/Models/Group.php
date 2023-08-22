<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Collection, Model, Relations\HasMany, SoftDeletes};

class Group extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'groups';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'group_id', 'id');
    }

    /**
     * @return Collection
     */
    public function publishedArticles(): Collection
    {
        return $this->articles()->where(['is_published' => true])->get();
    }
}
