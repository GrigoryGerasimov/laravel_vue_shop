<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Models\{Category, Color, Group, ImageType, Tag};
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesList = Category::all();
        $groupsList = Group::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();
        $articleImgTypes = ImageType::all();

        return view('articles.create', compact('categoriesList', 'groupsList', 'tagsList', 'colorsList', 'articleImgTypes'));
    }
}
