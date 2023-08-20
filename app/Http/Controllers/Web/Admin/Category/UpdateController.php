<?php

namespace App\Http\Controllers\Web\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Category $category): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $category->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('categories.show', $category);
    }
}
