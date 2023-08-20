<?php

namespace App\Http\Controllers\Web\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $tagsList = Tag::all();

        return view('tags.index', compact('tagsList'));
    }
}
