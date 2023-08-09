<?php

namespace App\Http\Controllers\Api\Color;

use App\Http\Controllers\Controller;
use App\Http\Resources\Color\ColorResource;
use App\Models\Color;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $colorsList = Color::all();

        return ColorResource::collection($colorsList);
    }
}
