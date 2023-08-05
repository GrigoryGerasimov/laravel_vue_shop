<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Article $article
     * @return View
     */
    public function __invoke(Article $article): View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();

        return view('articles.edit', compact('article', 'categoriesList', 'tagsList', 'colorsList'));
    }
}
