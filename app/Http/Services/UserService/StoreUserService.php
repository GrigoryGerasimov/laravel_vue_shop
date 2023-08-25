<?php

declare(strict_types=1);

namespace App\Http\Services\UserService;

use App\Models\{Address, User};
use App\Http\Services\AbstractMainEntityStoringService;
use Illuminate\Support\Facades\{DB, Hash, Log};

final class StoreUserService extends AbstractMainEntityStoringService
{
    public static function dispatch(array &$data): ?User
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

            $address = Address::create($addrData);

            $data['password'] = Hash::make($data['password']);
            $data['address_id'] = $address->id;

            $user = User::firstOrCreate(['email' => $data['email']], $data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err->getMessage(), $err->getTrace());
        }

        return $user ?? null;
    }
}
