<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\{Address, User};
use App\Http\Services\UserService\StoreUserService;
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
        $data = $request->validated();

        $user = StoreUserService::dispatch($data);

        return isset($user) ? redirect()->route('users.index') : redirect()->back();
    }
}
