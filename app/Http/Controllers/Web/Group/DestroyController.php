<?php

namespace App\Http\Controllers\Web\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class DestroyController extends Controller
{
    /**
     * @param Group $group
     * @return RedirectResponse
     */
    public function __invoke(Group $group): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $isDeleted = $group->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('groups.index') : redirect()->back();
    }
}
