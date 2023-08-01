<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag): RedirectResponse
    {
        $isRestored = $tag->restore();

        return $isRestored ? redirect()->route('tags.show', $tag) : redirect()->back();
    }
}
