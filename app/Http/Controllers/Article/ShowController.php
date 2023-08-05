<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * @param Article $article
     * @return View
     */
    public function __invoke(Article $article): View
    {
        return view('articles.show', compact('article'));
    }
}
