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
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Color</th>
                            <th class="text-center"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colorsList as $color)
                            <tr>
                                <td class="text-center">{{ $color->id }}</td>
                                <td class="text-center">{{ $color->title }}</td>
                                <td>
                                    <div style="width: 13px; height: 13px; margin: 5px auto; background-color:#{{ $color->hex }}; border: 1px solid #4b545c"></div>
                                </td>
                                <td class="text-center">
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
                <a href="{{ route('colors.create') }}" class="btn btn-dark m-5">New Color</a>
            </div>
        </div>
    </section>
@endsection
