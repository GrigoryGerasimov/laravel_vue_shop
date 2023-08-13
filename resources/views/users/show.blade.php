@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('users.index') }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User ID {{ $user->id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Addresses</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="10">
                            <div class="d-flex flex-row align-items-end mt-5">
                                <a href="{{ route('users.edit', $user) }}"
                                   class="text-dark mr-4">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
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
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ substr($user->password, 0, 15) }}...</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->gender->title }}</td>
                        <td>{{ $user->country->title }}</td>

                        <td>
                            <div>{{ $user->address->address_line_1 }}</div>
                            <div>{{ $user->address->address_line_2 }}</div>
                            <div>{{ $user->address->street_number }}</div>
                            <div>{{ $user->address->unit_number }}</div>
                            <div>{{ $user->address->postal_code }}, {{ $user->address->city }}</div>
                            <div>{{ $user->address->region }}</div>
                            <div>{{ $user->address->country->title }}</div>
                        </td>

                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
