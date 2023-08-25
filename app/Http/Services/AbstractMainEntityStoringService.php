<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Services\Contracts\MainEntitiyStoringServiceInterface;

abstract class AbstractMainEntityStoringService implements MainEntitiyStoringServiceInterface
{
    abstract public static function dispatch(array &$data);
}
