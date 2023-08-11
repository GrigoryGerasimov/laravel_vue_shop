@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('groups.show', $group) }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('admin.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Update Group</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form action='{{ route('groups.update', $group) }}' method='POST'
              enctype='application/x-www-form-urlencoded'>
            @csrf
            @method('patch')

            <div class='my-5'>
                <div class='input-group w-50'>
                    <div class='input-group-prepend'>
                    <span class='input-group-text'>
                        <i class="nav-icon fas fa-layer-group"></i>
                    </span>
                    </div>
                    <input class='form-control @error('title') is-invalid @enderror' id='title' name='title' value='{{ old('title') ?? $group->title }}'
                           placeholder='title'/>
                </div>
                @error('title')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <button type='submit' class='btn btn-light mt-3'>Update</button>
        </form>
    </section>
@endsection
