@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Groups</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($groupsList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groupsList as $group)
                            <tr class="text-center">
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->title }}</td>
                                <td>
                                    <a href="{{ route('groups.show', $group) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('groups.create') }}" class="btn btn-dark mx-4 my-3">New Group</a>
            </div>
        </div>
    </section>
@endsection
