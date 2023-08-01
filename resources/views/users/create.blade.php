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
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form action='{{ route('users.store') }}' method='POST' enctype='application/x-www-form-urlencoded'>
            @csrf

            <div class='mt-5'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='first_name' class='text-sm' style='width: 120px'>First Name</label>
                    <input
                        class='form-control @error('first_name') is-invalid @enderror'
                        style='width: 350px'
                        id='first_name'
                        name='first_name'
                        value='{{ old('first_name') }}'
                        placeholder='first name'/>
                </div>
                @error('first_name')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='middle_name' class='text-sm' style='width: 120px'>Middle Name</label>
                    <input
                        class='form-control @error('middle_name') is-invalid @enderror'
                        style='width: 350px'
                        id='middle_name'
                        name='middle_name'
                        value='{{ old('middle_name') }}'
                        placeholder='middle name'/>
                </div>
                @error('middle_name')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='last_name' class='text-sm' style='width: 120px'>Last Name</label>
                    <input
                        class='form-control @error('last_name') is-invalid @enderror'
                        style='width: 350px'
                        id='last_name'
                        name='last_name'
                        value='{{ old('last_name') }}'
                        placeholder='last name'/>
                </div>
                @error('last_name')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='email' class='text-sm' style='width: 120px'>Email</label>
                    <input
                        class='form-control @error('last_name') is-invalid @enderror'
                        style='width: 350px'
                        type='email'
                        id='email'
                        name='email'
                        value='{{ old('email') }}'
                        placeholder='email'/>
                </div>
                @error('email')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='password' class='text-sm' style='width: 120px'>Password</label>
                    <input
                        class='form-control @error('password') is-invalid @enderror'
                        style='width: 350px'
                        type='password'
                        id='password'
                        name='password'
                        value='{{ old('password') }}'
                        placeholder='password'/>
                </div>
                @error('password')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='password_confirmation' class='text-sm' style='width: 120px'>Password
                        Confirmation</label>
                    <input
                        class='form-control @error('password_confirmation') is-invalid @enderror'
                        style='width: 350px'
                        type='password'
                        id='password_confirmation'
                        name='password_confirmation'
                        value='{{ old('password_confirmation') }}'
                        placeholder='confirm password'/>
                </div>
                @error('password_confirmation')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='age' class='text-sm' style='width: 120px'>Age</label>
                    <input
                        class='form-control @error('age') is-invalid @enderror'
                        style='width: 350px'
                        type='number'
                        id='age'
                        name='age'
                        value='{{ old('age') }}'
                        placeholder='age'/>
                </div>
                @error('age')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>


            <div class='my-3'>
                <div class='form-group d-flex flex-row align-items-baseline'>
                    <label for='gender_id' class='text-sm' style='width: 120px'>Gender</label>
                    <select
                        class='custom-select @error('gender_id') is-invalid @enderror'
                        style='width: 350px'
                        id='gender_id'
                        name='gender_id'
                    >
                        <option disabled>Select...</option>
                        @foreach($gendersList as $gender)
                            <option value='{{ old('gender_id') }}'>{{ $gender->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('age')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>


            <button type='submit' class='btn btn-light mt-3'>Create</button>
        </form>
    </section>
@endsection
