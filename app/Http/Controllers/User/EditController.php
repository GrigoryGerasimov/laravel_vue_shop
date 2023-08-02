<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Country, Gender, User};
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $gendersList = Gender::all();
        $countriesList = Country::all();

        return view('users.edit', compact('user', 'gendersList', 'countriesList'));
    }
}
