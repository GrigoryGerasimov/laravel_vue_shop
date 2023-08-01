@extends('layouts.main')

@section('content')
    <section class='content'>

        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Tags</h3>
            </div>

            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">

                    @if($tagsList->isNotEmpty())
                        <div class="jsgrid-grid-header">
                            <table class="jsgrid-table" style="width: 100%">
                                <tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell" style="width: 30%;">
                                        ID
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 30%;">
                                        Title
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 40%">
                                        &nbsp;
                                    </th>
                                </tr>
                            </table>
                        </div>

                        <div class="jsgrid-grid-body">
                            <table class="jsgrid-table" style="width: 100%">
                                <tbody>
                                @foreach($tagsList as $tag)
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell" style="width: 30%;">
                                            {{ $tag->id }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 30%;">
                                            #{{ $tag->title }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 40%; text-align: center">
                                            <a href="{{ route('tags.show', $tag) }}"
                                               class="text-dark">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div>
                        <a href="{{ route('tags.create') }}" class="btn btn-dark mt-5">New Tag</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
