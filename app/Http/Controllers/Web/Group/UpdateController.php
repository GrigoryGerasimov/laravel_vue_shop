<?php

namespace App\Http\Controllers\Web\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Group $group): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $group->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('groups.show', $group);
    }
}
