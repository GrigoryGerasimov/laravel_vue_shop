<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('main.index');
    }
}
