<?php

namespace App\Http\Controllers\Web\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class RestoreController extends Controller
{
    /**
     * @param Color $color
     * @return RedirectResponse
     */
    public function __invoke(Color $color): RedirectResponse
    {
        $isRestored = $color->restore();

        return $isRestored ? redirect()->route('colors.show', $color) : redirect()->back();
    }
}
