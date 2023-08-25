<?php

namespace App\Http\Controllers\Api\Gender;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gender\GenderResource;
use App\Models\Gender;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $gendersList = Gender::all();

        return GenderResource::collection($gendersList);
    }
}
