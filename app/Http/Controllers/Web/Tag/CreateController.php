<?php

namespace App\Http\Controllers\Web\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('tags.create');
    }
}
