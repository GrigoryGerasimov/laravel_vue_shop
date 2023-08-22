<?php

namespace App\Http\Controllers\Api\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sizesList = Size::all();

        return ['size' => $sizesList];
    }
}
