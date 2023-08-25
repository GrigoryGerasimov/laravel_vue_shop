<?php

declare(strict_types=1);

namespace App\Http\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface MetaEntityStoringServiceInterface
{
    public static function store(array $ids, Model $model);

    public static function save(array &$data);
}
