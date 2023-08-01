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

        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">{{ $color->title }}</h3>
            </div>

            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">

                    <div class="jsgrid-grid-header">
                        <table class="jsgrid-table" style="width: 100%">
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    ID
                                </th>
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    Title
                                </th>
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    HEX
                                </th>
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    Color
                                </th>
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    Created At
                                </th>
                                <th class="jsgrid-header-cell text-sm" style="width: 13%;">
                                    Updated At
                                </th>
                                <th colspan="2" class="jsgrid-header-cell" style="width: 26%">
                                    &nbsp;
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="jsgrid-grid-body">
                        <table class="jsgrid-table" style="width: 100%">
                            <tbody>

                            <tr class="jsgrid-row">
                                <td class="jsgrid-cell text-sm" style="width: 13%;">
                                    {{ $color->id }}
                                </td>
                                <td class="jsgrid-cell text-sm" style="width: 13%;">
                                    {{ $color->title }}
                                </td>
                                <td class="jsgrid-cell text-sm" style="width: 13%;">
                                    #{{ $color->hex }}
                                </td>
                                <td class="jsgrid-cell" style="width: 13%;">
                                    <div style="width: 10px; height: 10px; background-color:#{{ $color->hex }}"></div>
                                </td>
                                <td class="jsgrid-cell text-sm" style="width: 13%;">
                                    {{ $color->created_at }}
                                </td>
                                <td class="jsgrid-cell text-sm" style="width: 13%;">
                                    {{ $color->updated_at }}
                                </td>
                                <td class="jsgrid-cell" style="width: 13%; text-align: center">
                                    <a href="{{ route('colors.edit', $color) }}"
                                       class="text-dark text-sm">Edit</a>
                                </td>
                                <td class="jsgrid-cell" style="width: 13%; text-align: center">
                                    <form action="{{ route('colors.destroy', $color) }}" method="POST" enctype="application/x-www-form-urlencoded">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn bg-transparent border-0 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
