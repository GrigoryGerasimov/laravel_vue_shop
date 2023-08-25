<?php

declare(strict_types=1);

namespace App\Http\Services\UserService;

use App\Http\Services\AbstractUpdatingService;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Database\Eloquent\Model;

final class UpdateUserService extends AbstractUpdatingService
{
    public static function dispatch(array &$data, Model $model): void
    {
        try {
            DB::beginTransaction();

            $addrKeys = [
                'address_line_1',
                'address_line_2',
                'street_number',
                'unit_number',
                'city',
                'region',
                'postal_code',
                'address_country_id'
            ];

            foreach($addrKeys as $addrKey) {
                $addrData[$addrKey] = $data[$addrKey];
            }

            array_walk($addrKeys, function ($key) use (&$data) { unset($data[$key]); });

            $model->address->update($addrData);

            $model->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err->getMessage(), $err->getTrace());
        }
    }
}
