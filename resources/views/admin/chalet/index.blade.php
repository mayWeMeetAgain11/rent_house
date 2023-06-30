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
                <h3>Chalet</h3>
                <a href="{{ route('admin.chalet.create') }}">
                    <button>add New chalet<span class="las la-plus"></span></button>
                </a>
            </div>
            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>
                                <i class="las la-city"></i>
                                city
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                regoion
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                owner
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                type
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                room number
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chalet as $item)
                            <tr>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->region }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->room_number }}</td>
                                <td>
                                    <a title="show" href="{{ route('admin.chalet.show', [$item->id]) }}">
                                        <span class="las la-eye"></span>
                                    </a>
                                    <a title="edit" href="{{ route('admin.chalet.edit', [$item->id]) }}">
                                        <span class="las la-edit"></span>

                                    </a>
                                    <a title="delete" href="{{ route('admin.chalet.destroy', [$item->id]) }}">
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
