@extends('layouts.saidbar')
@section('contents')
    <div class="containers">
        <div class="imgboxs">
            <img src="{{ asset('uploads/store/' . $store->photo->image) }}">
        </div>
        <div class="details">
            <div class="content">
                <h2>type: {{ $store->type }}</h2>
                @for ($count = 1; $count <= $rating; $count++)
                    <span style="color: gold; font-size:30px">&#9733;</span>
                @endfor
                <span>({{ $roundrating }})</span>
                <p>city: <span>{{ $store->city }}</span></p>
                <p>region: <span>{{ $store->region }}</span></p>
                <p>address: <span>{{ $store->address }}</span></p>
                <p>property: <span>{{ $store->show_type }}</span></p>
                <p>space: <span>{{ $store->space }}</span></p>
                <p>floor: <span>{{ $store->floors_number }}</span></p>
                <p>room: <span>{{ $store->room_number }}</span></p>
                <p>name: <span>{{ $store->user->name }}</span></p>
                <p>phone: <span>{{ $store->user->phone }}</span></p>
                <h3>price:{{ $store->price }}</h3>
                <form action="{{ route('user.request.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="owner_id" value="{{ $store->user->id }}">
                    <input type="hidden" name="ikar_id" value="{{ $store->id }}">
                    <input type="hidden" name="last_date" value="{{ now() }}">
                    <button class="supmit">request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
