@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <div class="containers">
                <div class="imgboxs">
                    <img src="{{ asset('uploads/' . $ikar->type . '/' . $ikar->photo->image) }}">
                </div>
                <div class="details">
                    <div class="content">
                        <h2>type: {{ $ikar->type }}</h2>
                        @for ($count = 1; $count <= $rating; $count++)
                            <span style="color: gold; font-size:30px">&#9733;</span>
                        @endfor
                        <span>({{ $roundrating }})</span>
                        <p>region: <span>{{ $ikar->region }}</span></p>
                        <p>address: <span>{{ $ikar->address }}</span></p>
                        <p>property: <span>{{ $ikar->show_type }}</span></p>
                        <p>space: <span>{{ $ikar->space }}</span></p>
                        <p>floor: <span>{{ $ikar->floors_number }}</span></p>
                        <p>room: <span>{{ $ikar->room_number }}</span></p>
                        <p>name: <span>{{ $ikar->user->name }}</span></p>
                        <p>phone: <span>{{ $ikar->user->phone }}</span></p>
                        <p>price:<span>{{ $ikar->price }}</span></p>
                        <a href="{{ route('user.rating', [$ikar->id]) }}">
                            <button>comment</button>
                        </a>
                        <form action="{{ route('user.request.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="owner_id" value="{{ $ikar->user->id }}">
                            <input type="hidden" name="ikar_id" value="{{ $ikar->id }}">
                            <input type="hidden" name="last_date" value="{{ now() }}">
                            <button class="supmit">request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
