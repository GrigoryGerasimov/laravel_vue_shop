<?php

declare(strict_types=1);

namespace App\Http\Services\Contracts;

interface MainEntitiyStoringServiceInterface
{
    public static function dispatch(array &$data);
}
