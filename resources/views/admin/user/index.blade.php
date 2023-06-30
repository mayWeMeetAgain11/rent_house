@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="progect">
        <div class="card">
            <div class="card-header">
                <h3>Users</h3>
                <a href="{{ route('admin.users.create') }}">
                    <button>add New user<span class="las la-plus"></span></button>
                </a>
            </div>
            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>
                                <i class="las la-city"></i>
                                name
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                phone
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                email
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                ikars
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->ikar->count() }}</td>
                                <td>
                                    <a title="edit" href="{{ route('admin.users.edit', [$item->id]) }}">
                                        <span class="las la-edit"></span>

                                    </a>
                                    <a title="delete" href="{{ route('admin.users.destroy', [$item->id]) }}">
                                        <span class="las la-trash"></span>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
