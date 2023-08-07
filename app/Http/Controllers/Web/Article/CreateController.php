<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Models\{Category, Color, Tag};
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesList = Category::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();

        return view('articles.create', compact('categoriesList', 'tagsList', 'colorsList'));
    }
}
