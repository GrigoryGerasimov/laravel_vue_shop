<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Services\Contracts\UpdatingServiceInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractUpdatingService implements UpdatingServiceInterface
{
    abstract public static function dispatch(array &$data, Model $model);
}
