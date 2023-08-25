<?php

declare(strict_types=1);

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractMetaEntityStoringService
{
    abstract public static function store(array $ids, Model $model);

    abstract public static function save(array &$data);
}
