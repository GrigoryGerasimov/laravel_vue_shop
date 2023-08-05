@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tags</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($tagsList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tagsList as $tag)
                            <tr class="text-center">
                                <td>{{ $tag->id }}</td>
                                <td>#{{ $tag->title }}</td>
                                <td>
                                    <a href="{{ route('tags.show', $tag) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('tags.create') }}" class="btn btn-dark mx-4 my-3">New Tag</a>
            </div>
        </div>
    </section>
@endsection
