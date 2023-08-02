<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $usersList = User::all();

        return view('main.index', compact('usersList'));
    }
}
