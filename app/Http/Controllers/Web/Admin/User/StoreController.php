<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\{Address, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Hash, Log};

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

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

            Log::error($err);
        }

        return isset($user) ? redirect()->route('users.index') : redirect()->back();
    }
}
