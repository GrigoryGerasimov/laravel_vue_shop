@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($usersList->isNotEmpty())
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Country</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersList as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->gender->title }}</td>
                                <td class="text-center">{{ $user->city }}</td>
                                <td class="text-center">{{ $user->country->title }}</td>
                                <td class="text-center">
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
                <a href="{{ route('users.create') }}" class="btn btn-dark m-5">New User</a>
            </div>
        </div>
    </section>
@endsection
