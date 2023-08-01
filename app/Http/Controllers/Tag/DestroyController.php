<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $isDeleted = $tag->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('tags.index') : redirect()->back();
    }
}
