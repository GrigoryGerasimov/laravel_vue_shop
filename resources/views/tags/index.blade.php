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
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tagsList as $tag)
                            <tr>
                                <td class="text-center">{{ $tag->id }}</td>
                                <td class="text-center">#{{ $tag->title }}</td>
                                <td class="text-center">
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
                <a href="{{ route('tags.create') }}" class="btn btn-dark m-5">New Tag</a>
            </div>
        </div>
    </section>
@endsection
