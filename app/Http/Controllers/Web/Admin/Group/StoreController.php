<?php

namespace App\Http\Controllers\Web\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $group = Group::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }


        return isset($group) ? redirect()->route('groups.index') : redirect()->back();
    }
}
