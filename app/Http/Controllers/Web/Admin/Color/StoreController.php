<?php

namespace App\Http\Controllers\Web\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Models\Color;
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

            $color = Color::firstOrCreate(['hex' => $data['hex']], $data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }


        return isset($color) ? redirect()->route('colors.index') : redirect()->back();
    }
}
