@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('groups.index') }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Group ID {{ $group->id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">{{ $group->title }}</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex flex-row align-items-end mt-5">
                                <a href="{{ route('groups.edit', $group) }}"
                                   class="text-dark mr-4">Edit</a>
                                <form action="{{ route('groups.destroy', $group) }}" method="POST"
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
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->title }}</td>
                        <td>{{ $group->created_at }}</td>
                        <td>{{ $group->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
