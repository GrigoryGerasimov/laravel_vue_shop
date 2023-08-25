<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Services\Contracts\DestroyingServiceInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractDestroyingService implements DestroyingServiceInterface
{
    abstract public static function dispatch(Model $model);
}
