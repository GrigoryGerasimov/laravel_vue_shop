<?php

namespace App\Http\Controllers\User;

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

            $user->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('users.show', $user);
    }
}
