@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('articles.index') }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Article ID {{ $article->id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $article->title }}</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Title</th>
                        <th>EAN/GTIN</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Previous Price</th>
                        <th>Purchase Price</th>
                        <th>RRP</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Product Group</th>
                        <th>Colors</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="13">
                            <div class="d-flex flex-row align-items-end mt-5">
                                <a href="{{ route('articles.edit', $article) }}"
                                   class="text-dark mr-4">Edit</a>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                      enctype="application/x-www-form-urlencoded"
                                >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="m-0 p-0 btn bg-transparent border-0">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr class="text-center">
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->ean }}</td>
                        <td>{{ $article->description }}</td>
                        <td>
                            @if($article->preview_img && Storage::disk('public')->exists($article->preview_img))
                                <img
                                    src='{{ url('storage/' . $article->preview_img) }}'
                                    alt='{{ $article->title }}'
                                    style='height: 25px;'
                                />
                            @endif
                        </td>
                        <td>{{ $article->previous_price }} &#8364;</td>
                        <td>{{ $article->purchase_price }} &#8364;</td>
                        <td>{{ $article->recommended_retail_price }} &#8364;</td>
                        <td>{{ $article->total_amount }}</td>
                        <td>{{ $article->category->title }}</td>
                        <td>{{ $article->group->title }}</td>
                        <td>
                            {{ substr($article->activeColors->reduce(function($acc, $val) { return $acc . ', ' . $val->title; }), 2) }}
                        </td>
                        <td>
                            {{ substr($article->activeTags->reduce(function($acc, $val) { return $acc . ', ' . "#$val->title"; }), 2) }}
                        </td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
