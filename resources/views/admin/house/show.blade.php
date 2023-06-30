@extends('layouts.saidbar')
@section('contents')
    <div class="containers">
        <div class="imgboxs">
            <img src="{{ asset('uploads/house/' . $house->photo->image) }}">
        </div>
        <div class="details">
            <div class="content">
                <h2>type: {{ $house->type }}</h2>
                @for ($count = 1; $count <= $rating; $count++)
                    <span style="color: gold; font-size:30px">&#9733;</span>
                @endfor
                <span>({{ $roundrating }})</span>
                <p>city: <span>{{ $house->city }}</span></p>
                <p>region: <span>{{ $house->region }}</span></p>
                <p>address: <span>{{ $house->address }}</span></p>
                <p>property: <span>{{ $house->show_type }}</span></p>
                <p>space: <span>{{ $house->space }}</span></p>
                <p>floor: <span>{{ $house->floors_number }}</span></p>
                <p>room: <span>{{ $house->room_number }}</span></p>
                <p>name: <span>{{ $house->user->name }}</span></p>
                <p>phone: <span>{{ $house->user->phone }}</span></p>
                <h3>price:{{ $house->price }}</h3>
                <form action="{{ route('user.request.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="owner_id" value="{{ $house->user->id }}">
                    <input type="hidden" name="ikar_id" value="{{ $house->id }}">
                    <input type="hidden" name="last_date" value="{{ now() }}">
                    <button class="supmit">request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
