@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <h3 class="special-headeing">result</h3>
            <p>If you do it right, it will last forever.</p>
            <div class="portfolio-contener">
                @foreach ($result as $item)
                    <a href="{{ route('user.show', [$item->id]) }}">
                        <div class="card" data-item="{{ $item->type }}">
                            <img src="{{ asset('uploads/' . $item->type . '/' . $item->photo->image) }}" alt="">
                            <div class="info">
                                <h3>city: {{ $item->city }}</h3>
                                <p>
                                    {{ $item->type }}
                                </p>
                                <div class="details">
                                    <div>
                                        <p class="one">room</p>
                                        <p><i class="fab fa-sketch"></i> {{ $item->room_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">floor</p>
                                        <p><i class="fab fa-sketch"></i> {{ $item->floors_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">space</p>
                                        <p><i class="fab fa-sketch"></i> {{ $item->space }}m</p>
                                    </div>
                                </div>
                                for {{ $item->show_type }}
                                <span class="price">{{ $item->price }} s.p</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
