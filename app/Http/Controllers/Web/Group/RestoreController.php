<?php

namespace App\Http\Controllers\Web\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Group $group
     * @return RedirectResponse
     */
    public function __invoke(Group $group): RedirectResponse
    {
        $isRestored = $group->restore();

        return $isRestored ? redirect()->route('groups.show', $group) : redirect()->back();
    }
}
