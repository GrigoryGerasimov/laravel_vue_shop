<?php

declare(strict_types=1);

namespace App\Http\Services\UserService;

use App\Http\Services\AbstractDestroyingService;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Database\Eloquent\Model;

final class DestroyUserService extends AbstractDestroyingService
{
    public static function dispatch(Model $model): ?bool
    {
        try {
            DB::beginTransaction();

            $model->address->delete();

            $isDeleted = $model->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            $isDeleted = false;

            Log::error($err->getMessage(), $err->getTrace());
        }

        return $isDeleted;
    }
}
