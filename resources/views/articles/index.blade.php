@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Articles</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($articlesList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articlesList as $article)
                            <tr class="text-center">
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->description }}</td>
                                <td>{{ $article->purchase_price }} &#8364;</td>
                                <td>{{ $article->total_amount }}</td>
                                <td>{{ $article->category->title }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $article) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('articles.create') }}" class="btn btn-dark mx-4 my-3">New Article</a>
            </div>
        </div>
    </section>
@endsection
