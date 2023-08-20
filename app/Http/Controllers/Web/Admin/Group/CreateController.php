<?php

namespace App\Http\Controllers\Web\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('groups.create');
    }
}
