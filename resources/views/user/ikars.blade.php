@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <h3 class="special-headeing">All</h3>
            {{-- <p>If you do it right, it will last forever.</p> --}}
            <ul class="itemlist">
                <li class="active" data-filter="All">All</li>
                <li data-filter="house">House</li>
                <li data-filter="store">Store</li>
                <li data-filter="chalet">Chalet</li>
            </ul>
            <div class="portfolio-contener">
                @foreach ($ikar as $item)
                    <a href="{{ route('user.show', [$item->id]) }}">
                        <div class="card" data-item="{{ $item->type }}">
                            <img src="{{ asset('uploads/' . $item->type . '/' . $item->photo->image) }}" alt="">
                            <div class="info">
                                <h3>city: {{ $item->city }}</h3>
                                <p>
                                    My creative ability is very difficult to measure because it
                                </p>
                                <div class="details">
                                    <div>
                                        <p class="one">room</p>
                                        <p><i class="fas fa-bed"></i> {{ $item->room_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">floor</p>
                                        <p><i class="fas fa-landmark"></i> {{ $item->floors_number }}</p>
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
    <script src="/js/main.js"></script>
@endsection
