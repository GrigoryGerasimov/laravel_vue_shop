<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Http\Resources\Article\ArticleResourceWithGroup;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request): AnonymousResourceCollection
    {
        $data = $request->validated();
        $itemsPerPage = !isset($data['itemsPerPage']) || !$data['itemsPerPage'] ? 3 : $data['itemsPerPage'];
        $page = $data['pageId'] ?? null;
        $col = $data['col'] ?? 'title';
        $dir = $data['dir'] ?? 'asc';

        $filteredData = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);

        $filtered = Article::query()->where(['is_published' => true])->filter($filteredData)->orderBy($col, $dir)->paginate($itemsPerPage, ['*'], 'page', $page);

        return ArticleResourceWithGroup::collection($filtered);
    }
}
