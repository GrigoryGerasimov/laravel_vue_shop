@extends('layouts.main')

@section('content')
    <section class='content'>

        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>

            <div class="card-body">
                <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">

                    @if($usersList->isNotEmpty())
                        <div class="jsgrid-grid-header">
                            <table class="jsgrid-table" style="width: 100%">
                                <tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        ID
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        Name
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        Email
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        Gender
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        City
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%;">
                                        Country
                                    </th>
                                    <th class="jsgrid-header-cell" style="width: 14%">
                                        &nbsp;
                                    </th>
                                </tr>
                            </table>
                        </div>

                        <div class="jsgrid-grid-body">
                            <table class="jsgrid-table" style="width: 100%">
                                <tbody>
                                @foreach($usersList as $user)
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            {{ $user->id }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            {{ $user->first_name }}{{ $user->middle_name }}{{ $user->last_name }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            {{ $user->email }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            {{ $user->gender->title }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            {{ $user->city }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%;">
                                            #{{ $user->country->title }}
                                        </td>
                                        <td class="jsgrid-cell" style="width: 14%; text-align: center">
                                            <a href="{{ route('users.show', $user) }}"
                                               class="text-dark">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-dark mt-5">New User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
