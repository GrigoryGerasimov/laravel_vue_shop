<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService\DestroyUserService;
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
        $isDeleted = DestroyUserService::dispatch($user);

        return isset($isDeleted) ? redirect()->route('users.index') : redirect()->back();
    }
}
