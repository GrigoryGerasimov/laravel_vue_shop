<?php

namespace App\Http\Controllers\Web\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class DestroyController extends Controller
{
    /**
     * @param Color $color
     * @return RedirectResponse
     */
    public function __invoke(Color $color): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $isDeleted = $color->delete();

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return isset($isDeleted) ? redirect()->route('colors.index') : redirect()->back();
    }
}
