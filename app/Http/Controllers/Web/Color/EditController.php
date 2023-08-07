<?php

namespace App\Http\Controllers\Web\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Color $color
     * @return View
     */
    public function __invoke(Color $color): View
    {
        return view('colors.edit', compact('color'));
    }
}
