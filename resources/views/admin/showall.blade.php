@extends('layouts.saidbar')
@section('contents')
    <div class="cards">
        <a href="{{ route('admin.houses') }}">
            <div class="card-single">
                <div>
                    <h1>{{ $house }}</h1>
                    <span>House</span>
                </div>
                <div>
                    <span class="las la-home"></span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.chalets') }}">
            <div class="card-single">
                <div>
                    <h1>{{ $chalet }}</h1>
                    <span>Chalet</span>
                </div>
                <div>
                    <span class="las la-building"></span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.users') }}">
            <div class="card-single">
                <div>
                    <h1>{{ $user }}</h1>
                    <span>Users</span>
                </div>
                <div>
                    <span class="las la-user"></span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.stores') }}">
            <div class="card-single">
                <div>
                    <h1>{{ $store }}</h1>
                    <span>Store</span>
                </div>
                <div>
                    <span class="las la-store"></span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.rating') }}">
            <div class="card-single">
                <div>
                    <h1>{{ 0 }}</h1>
                    <span>rating</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
        </a>
    </div>
@endsection
