@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Colors</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    @if($colorsList->isNotEmpty())
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Color</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colorsList as $color)
                            <tr class="text-center">
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->title }}</td>
                                <td>
                                    <div style="width: 13px; height: 13px; margin: 5px auto; background-color:#{{ $color->hex }}; border: 1px solid #4b545c"></div>
                                </td>
                                <td>
                                    <a href="{{ route('colors.show', $color) }}"
                                       class="text-dark">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            <div>
                <a href="{{ route('colors.create') }}" class="btn btn-dark mx-4 my-3">New Color</a>
            </div>
        </div>
    </section>
@endsection
