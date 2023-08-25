<?php

declare(strict_types=1);

namespace App\Http\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface DestroyingServiceInterface
{
    public static function dispatch(Model $model);
}
