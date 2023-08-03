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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Nationality</th>
                        <th class="text-center">Addresses</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
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
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ substr($user->password, 0, 15) }}...</td>
                        <td class="text-center">{{ $user->age }}</td>
                        <td class="text-center">{{ $user->gender->title }}</td>
                        <td class="text-center">{{ $user->country->title }}</td>

                        <td class="text-center">
                            <div>{{ $user->address->address_line_1 }}</div>
                            <div>{{ $user->address->address_line_2 }}</div>
                            <div>{{ $user->address->street_number }}</div>
                            <div>{{ $user->address->unit_number }}</div>
                            <div>{{ $user->address->postal_code }}, {{ $user->address->city }}</div>
                            <div>{{ $user->address->region }}</div>
                            <div>{{ $user->address->country->title }}</div>
                        </td>

                        <td class="text-center">{{ $user->created_at }}</td>
                        <td class="text-center">{{ $user->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
