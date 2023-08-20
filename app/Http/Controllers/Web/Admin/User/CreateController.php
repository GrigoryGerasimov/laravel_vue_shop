<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\{Country, Gender};
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $gendersList = Gender::all();
        $countriesList = Country::all();

        return view('users.create', compact('gendersList', 'countriesList'));
    }
}
