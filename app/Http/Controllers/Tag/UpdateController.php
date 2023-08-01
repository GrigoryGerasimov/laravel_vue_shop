<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Tag $tag): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $tag->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('tags.show', $tag);
    }
}
