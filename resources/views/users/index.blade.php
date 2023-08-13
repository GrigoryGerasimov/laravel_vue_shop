@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($usersList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersList as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender->title }}</td>
                                <td>{{ $user->country->title }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('users.create') }}" class="btn btn-dark mx-4 my-3">New User</a>
            </div>
        </div>
    </section>
@endsection
