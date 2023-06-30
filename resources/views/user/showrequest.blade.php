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
                        @else
                            <a href="{{ route('user.create') }}">
                                <button>add ikar<span class="las la-plus"></span></button>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>
                                        <i class="las la-city"></i>
                                        #
                                    </td>
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
                                        address
                                    </td>
                                    <td>
                                        <i class="las la-city"></i>
                                        city
                                    </td>
                                    <td>
                                        <i class="las la-city"></i>
                                        action
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->phone }}</td>
                                        <td>{{ $item->ikar->address }}</td>
                                        <td>{{ $item->ikar->city }}</td>
                                        <td>
                                            <a title="delete" href="{{ route('user.request.delete', [$item->id]) }}">
                                                <span class="las la-trash"></span>
                                            </a>
                                            <a title="deal" href="{{ route('user.request.deal', [$item->id]) }}">
                                                <span class="las la-comment"></span>
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
