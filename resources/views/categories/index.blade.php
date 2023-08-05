@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($categoriesList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoriesList as $category)
                            <tr class="text-center">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-dark mx-4 my-3">New Category</a>
            </div>
        </div>
    </section>
@endsection
