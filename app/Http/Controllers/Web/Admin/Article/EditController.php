<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\{Article, Category, Color, Group, ImageType, SizeScale, Tag};
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
        $sizeScalesList = SizeScale::all();
        $groupsList = Group::all();
        $tagsList = Tag::all();
        $colorsList = Color::all();
        $articleImgTypes = ImageType::all()->pluck('title')->toArray();

        return view('articles.edit', compact('article', 'categoriesList', 'sizeScalesList', 'groupsList', 'tagsList', 'colorsList', 'articleImgTypes'));
    }
}
