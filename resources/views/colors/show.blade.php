@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('colors.index') }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Color ID {{ $color->id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $color->title }}</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">HEX</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="10">
                            <div class="d-flex flex-row align-items-end mt-5">
                                <a href="{{ route('colors.edit', $color) }}"
                                   class="text-dark mr-4">Edit</a>
                                <form action="{{ route('colors.destroy', $color) }}" method="POST"
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
                        <td class="text-center">{{ $color->id }}</td>
                        <td class="text-center">{{ $color->title }}</td>
                        <td class="text-center">#{{ $color->hex }}</td>
                        <td>
                            <div style="width: 13px; height: 13px; margin: 5px auto; background-color:#{{ $color->hex }}; border: 1px solid #4b545c"></div>
                        </td>
                        <td class="text-center">{{ $color->created_at }}</td>
                        <td class="text-center">{{ $color->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
