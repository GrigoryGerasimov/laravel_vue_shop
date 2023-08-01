<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function __invoke(Category $category): RedirectResponse
    {
        $isRestored = $category->restore();

        return $isRestored ? redirect()->route('categories.show', $category) : redirect()->back();
    }
}
