<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Models\{Article, Category, Color, Group, Tag};
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
        $groupsList = Group::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();

        return view('articles.edit', compact('article', 'categoriesList', 'groupsList', 'tagsList', 'colorsList'));
    }
}
