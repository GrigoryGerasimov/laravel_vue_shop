<?php

namespace App\Http\Controllers\Web\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * @param Tag $tag
     * @return View
     */
    public function __invoke(Tag $tag): View
    {
        return view('tags.show', compact('tag'));
    }
}
