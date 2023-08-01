<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        return view('users.show', compact('user'));
    }
}
