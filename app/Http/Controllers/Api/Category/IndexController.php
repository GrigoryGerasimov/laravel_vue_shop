<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $categoriesList = Category::all();

        return CategoryResource::collection($categoriesList);
    }
}
