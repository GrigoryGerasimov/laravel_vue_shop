<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('categories.create');
    }
}
