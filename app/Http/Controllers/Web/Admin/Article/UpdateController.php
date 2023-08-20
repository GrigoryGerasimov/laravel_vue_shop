<?php

namespace App\Http\Controllers\Web\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Services\ColorService\UpdateColorService;
use App\Http\Services\ImageService\UpdateImageService;
use App\Http\Services\TagService\UpdateTagService;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{DB, Log};

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Article $article): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $data['is_published'] = key_exists('is_published', $data) && $data['is_published'] === 'on';

            UpdateImageService::dispatch($data, $article);
            UpdateTagService::dispatch($data, $article->id);
            UpdateColorService::dispatch($data, $article->id);

            $article->update($data);

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();

            Log::error($err);
        }

        return redirect()->route('articles.show', $article);
    }
}
