@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('categories.index') }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Create Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form action='{{ route('categories.store') }}' method='POST' enctype='application/x-www-form-urlencoded'>
            @csrf

            <div class='input-group my-5 w-50'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'>
                        <i class="fas fa-th-list"></i>
                    </span>
                </div>
                <input class='form-control' id='title' name='title' value='{{ old('title') }}' placeholder='Category Title'/>
            </div>

            <button type='submit' class='btn btn-outline-success mt-3'>Create</button>
        </form>
    </section>
@endsection
