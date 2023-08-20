<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Category $category
     * @return View
     */
    public function __invoke(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }
}
