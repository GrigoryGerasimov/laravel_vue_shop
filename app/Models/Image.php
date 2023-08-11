<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, SoftDeletes};

class Image extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return BelongsTo
     */
    public function imageType(): BelongsTo
    {
        return $this->belongsTo(ImageType::class, 'img_type_id', 'id');
    }
}
