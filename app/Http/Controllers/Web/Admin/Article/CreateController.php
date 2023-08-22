<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\{Category, Color, Group, ImageType, SizeScale, Tag};
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $categoriesList = Category::all();
        $sizeScalesList = SizeScale::all();
        $groupsList = Group::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();
        $articleImgTypes = ImageType::all()->pluck('title')->toArray();

        return view('articles.create', compact('categoriesList', 'sizeScalesList', 'groupsList', 'tagsList', 'colorsList', 'articleImgTypes'));
    }
}
