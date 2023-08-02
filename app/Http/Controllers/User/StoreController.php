<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
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

            $data['password'] = Hash::make($data['password']);

            $user = User::firstOrCreate(['email' => $data['email']], $data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($user) ? redirect()->route('users.index') : redirect()->back();
    }
}
