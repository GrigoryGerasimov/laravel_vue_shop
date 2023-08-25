<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Services\UserService\UpdateUserService;
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
        $data = $request->validated();

        UpdateUserService::dispatch($data, $user);

        return redirect()->route('users.show', $user);
    }
}
