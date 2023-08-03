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

            <div class="my-5">
                <h6 class="text-secondary">Personal Details</h6>

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
                            <option selected disabled>select...</option>
                            @foreach($gendersList as $gender)
                                <option value='{{ $gender->id }}' @if(old('gender_id') == $gender->id) selected @endif>{{ $gender->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('gender_id')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='country_id' class='text-sm' style='width: 120px'>Nationality</label>
                        <select
                            class='custom-select @error('country_id') is-invalid @enderror'
                            style='width: 350px'
                            id='country_id'
                            name='country_id'
                        >
                            <option selected disabled>select...</option>
                            @foreach($countriesList as $country)
                                <option value='{{ $country->id }}' @if(old('country_id') == $country->id) selected @endif>{{ $country->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country_id')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr/>

            <div class="my-5">
                <h6 class="text-secondary">Address Details</h6>

                <div class='mt-5'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='address_line_1' class='text-sm' style='width: 120px'>Address Line 1</label>
                        <input
                            class='form-control @error('address_line_1') is-invalid @enderror'
                            style='width: 350px'
                            id='address_line_1'
                            name='address_line_1'
                            value='{{ old('address_line_1') }}'
                            placeholder='first address line'/>
                    </div>
                    @error('address_line_1')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='address_line_2' class='text-sm' style='width: 120px'>Address Line 2</label>
                        <input
                            class='form-control @error('address_line_2') is-invalid @enderror'
                            style='width: 350px'
                            id='address_line_2'
                            name='address_line_2'
                            value='{{ old('address_line_2') }}'
                            placeholder='second address line'/>
                    </div>
                    @error('address_line_2')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='street_number' class='text-sm' style='width: 120px'>Street Nr</label>
                        <input
                            class='form-control @error('street_number') is-invalid @enderror'
                            style='width: 350px'
                            id='street_number'
                            name='street_number'
                            value='{{ old('street_number') }}'
                            placeholder='street number'/>
                    </div>
                    @error('street_number')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='unit_number' class='text-sm' style='width: 120px'>Unit Nr</label>
                        <input
                            class='form-control @error('unit_number') is-invalid @enderror'
                            style='width: 350px'
                            id='unit_number'
                            name='unit_number'
                            value='{{ old('unit_number') }}'
                            placeholder='unit number'/>
                    </div>
                    @error('unit_number')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='city' class='text-sm' style='width: 120px'>City</label>
                        <input
                            class='form-control @error('city') is-invalid @enderror'
                            style='width: 350px'
                            id='city'
                            name='city'
                            value='{{ old('city') }}'
                            placeholder='city'/>
                    </div>
                    @error('city')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='region' class='text-sm' style='width: 120px'>Region</label>
                        <input
                            class='form-control @error('region') is-invalid @enderror'
                            style='width: 350px'
                            id='region'
                            name='region'
                            value='{{ old('region') }}'
                            placeholder='region'/>
                    </div>
                    @error('region')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='postal_code' class='text-sm' style='width: 120px'>Postal Code</label>
                        <input
                            class='form-control @error('postal_code') is-invalid @enderror'
                            style='width: 350px'
                            id='postal_code'
                            name='postal_code'
                            value='{{ old('postal_code') }}'
                            placeholder='postal code'/>
                    </div>
                    @error('postal_code')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>

                <div class='my-3'>
                    <div class='form-group d-flex flex-row align-items-baseline'>
                        <label for='address_country_id' class='text-sm' style='width: 120px'>Country</label>
                        <select
                            class='custom-select @error('address_country_id') is-invalid @enderror'
                            style='width: 350px'
                            id='address_country_id'
                            name='address_country_id'
                        >
                            <option selected disabled>select...</option>
                            @foreach($countriesList as $country)
                                <option value='{{ $country->id }}' @if(old('address_country_id') == $country->id) selected @endif>{{ $country->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('address_country_id')
                    <p class='text-danger mt-3'>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type='submit' class='btn btn-light mt-5'>Create</button>
        </form>
    </section>
@endsection
