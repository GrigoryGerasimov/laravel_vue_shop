<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Services\UserService\StoreUserService;
use Illuminate\Http\{RedirectResponse, Response};

class RegisterController extends Controller
{
    public function __invoke(StoreRequest $request): Response|RedirectResponse
    {
        $data = $request->validated();

        $user = StoreUserService::dispatch($data);

        return isset($user) ? response(['status' => true, 'user' => new UserResource($user)], 201) : redirect()->back();
    }
}
