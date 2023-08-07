<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, User $user): RedirectResponse
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

            $user->address->update($addrData);

            $user->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('users.show', $user);
    }
}
