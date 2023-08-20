<?php

namespace App\Http\Controllers\Web\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $colorsList = Color::all();

        return view('colors.index', compact('colorsList'));
    }
}
