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
                            <li class="breadcrumb-item active">Category #{{ $category->id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">{{ $category->title }}</h3>
            </div>

            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">

                    <div class="jsgrid-grid-header">
                        <table class="jsgrid-table" style="width: 100%">
                            <tr class="jsgrid-header-row">
                                <th class="jsgrid-header-cell" style="width: 20%;">
                                    ID
                                </th>
                                <th class="jsgrid-header-cell" style="width: 20%;">
                                    Title
                                </th>
                                <th class="jsgrid-header-cell" style="width: 20%;">
                                    Created At
                                </th>
                                <th class="jsgrid-header-cell" style="width: 20%;">
                                    Updated At
                                </th>
                                <th colspan="2" class="jsgrid-header-cell" style="width: 20%">
                                    &nbsp;
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="jsgrid-grid-body">
                        <table class="jsgrid-table" style="width: 100%">
                            <tbody>

                            <tr class="jsgrid-row">
                                <td class="jsgrid-cell" style="width: 20%;">
                                    {{ $category->id }}
                                </td>
                                <td class="jsgrid-cell" style="width: 20%;">
                                    {{ $category->title }}
                                </td>
                                <td class="jsgrid-cell" style="width: 20%;">
                                    {{ $category->created_at }}
                                </td>
                                <td class="jsgrid-cell" style="width: 20%;">
                                    {{ $category->updated_at }}
                                </td>
                                <td class="jsgrid-cell" style="width: 10%; text-align: center">
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="text-dark">Edit</a>
                                </td>
                                <td class="jsgrid-cell" style="width: 10%; text-align: center">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" enctype="application/x-www-form-urlencoded">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn bg-transparent border-0">Delete</button>
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
