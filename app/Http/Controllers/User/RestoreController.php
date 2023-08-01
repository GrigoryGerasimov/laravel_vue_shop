<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function __invoke(User $user): RedirectResponse
    {
        $isRestored = $user->restore();

        return $isRestored ? redirect()->route('users.show', $user) : redirect()->back();
    }
}
