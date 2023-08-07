<?php

namespace App\Http\Controllers\Web\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Color $color
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Color $color): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $color->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('colors.show', $color);
    }
}
