<?php

namespace App\Http\Controllers\Web\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\View\View;

class EditController extends Controller
{
    /**
     * @param Group $group
     * @return View
     */
    public function __invoke(Group $group): View
    {
        return view('groups.edit', compact('group'));
    }
}
