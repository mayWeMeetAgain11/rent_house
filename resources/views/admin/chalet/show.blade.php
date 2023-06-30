@extends('layouts.saidbar')
@section('contents')
    <div class="containers">
        <div class="imgboxs">
            <img src="{{ asset('uploads/chalet/' . $chalet->photo->image) }}">
        </div>
        <div class="details">
            <div class="content">
                <h2>type: {{ $chalet->type }}</h2>
                @for ($count = 1; $count <= $rating; $count++)
                    <span style="color: gold; font-size:30px">&#9733;</span>
                @endfor
                <span>({{ $roundrating }})</span>
                <p>city: <span>{{ $chalet->city }}</span></p>
                <p>region: <span>{{ $chalet->region }}</span></p>
                <p>address: <span>{{ $chalet->address }}</span></p>
                <p>property: <span>{{ $chalet->show_type }}</span></p>
                <p>space: <span>{{ $chalet->space }}</span></p>
                <p>floor: <span>{{ $chalet->floors_number }}</span></p>
                <p>room: <span>{{ $chalet->room_number }}</span></p>
                <p>name: <span>{{ $chalet->user->name }}</span></p>
                <p>phone: <span>{{ $chalet->user->phone }}</span></p>
                <h3>price:{{ $chalet->price }}</h3>
                <form action="{{ route('user.request.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="owner_id" value="{{ $chalet->user->id }}">
                    <input type="hidden" name="ikar_id" value="{{ $chalet->id }}">
                    <input type="hidden" name="last_date" value="{{ now() }}">
                    <button class="supmit">request</button>
                </form>
            </div>
        </div>
    </div>
@endsection
