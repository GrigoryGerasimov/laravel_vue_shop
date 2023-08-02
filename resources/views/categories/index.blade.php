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
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoriesList as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td class="text-center">{{ $category->title }}</td>
                                <td class="text-center">
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
                <a href="{{ route('categories.create') }}" class="btn btn-dark m-5">New Category</a>
            </div>
        </div>
    </section>
@endsection
