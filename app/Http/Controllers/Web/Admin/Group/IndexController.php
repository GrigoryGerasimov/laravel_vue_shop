<?php

namespace App\Http\Controllers\Web\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $groupsList = Group::all();

        return view('groups.index', compact('groupsList'));
    }
}
