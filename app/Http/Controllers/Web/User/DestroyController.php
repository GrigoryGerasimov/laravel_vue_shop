<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class DestroyController extends Controller
{
    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(User $user): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $user->address->delete();

            $isDeleted = $user->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('users.index') : redirect()->back();
    }
}
