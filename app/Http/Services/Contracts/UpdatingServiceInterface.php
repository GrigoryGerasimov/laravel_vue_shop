<?php

declare(strict_types=1);

namespace App\Http\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UpdatingServiceInterface
{
    public static function dispatch(array &$data, Model $model);
}
