@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            @if ($message = Session::get('success'))
                <div class="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="progect">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3>Ikar</h3> --}}
                        @if (Auth::check() && Auth::user()->group_by == 1)
                            <a href="{{ route('admin.house.create') }}">
                                <button>add house<span class="las la-plus"></span></button>
                            </a>
                            <a href="{{ route('admin.store.create') }}">
                                <button>add store<span class="las la-plus"></span></button>
                            </a>
                            <a href="{{ route('admin.chalet.create') }}">
                                <button>add chalet<span class="las la-plus"></span></button>
                            </a>
                            <a href="{{ route('user.request.show') }}">
                                <button>request<span class="las la-plus"></span></button>
                            </a>
                        @else
                            <a href="{{ route('user.create') }}">
                                <button>add ikar<span class="las la-plus"></span></button>
                            </a>
                            <a href="{{ route('user.request.show') }}">
                                <button>request</span></button>
                            </a>
                        @endif
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
                                @foreach ($ikar as $item)
                                    <tr>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->region }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->room_number }}</td>
                                        <td>
                                            <a title="show" href="{{ route('user.show', [$item->id]) }}">
                                                <span class="las la-eye"></span>
                                            </a>
                                            <a title="edit" href="{{ route('user.edit', [$item->id]) }}">
                                                <span class="las la-edit"></span>
                                            </a>
                                            <a title="delete" href="{{ route('user.delete', [$item->id]) }}">
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
        </div>
    </div>
@endsection
