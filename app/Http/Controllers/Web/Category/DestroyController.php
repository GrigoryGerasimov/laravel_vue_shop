<?php

namespace App\Http\Controllers\Web\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class DestroyController extends Controller
{
    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function __invoke(Category $category): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $isDeleted = $category->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('categories.index') : redirect()->back();
    }
}
