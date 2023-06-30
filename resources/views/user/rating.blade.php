@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <div class="containers">
                <div class="imgboxs" style="flex-direction: column; gap: 20px;">
                    <div>
                        <h1>write rating</h1>
                    </div>
                    <form action="{{ route('user.create.rating') }}" method="post" style="text-align: center">
                        @csrf
                        <div class="rate">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <div>
                            <label for="">your comment</label>
                        </div>
                        <div>
                            <input type="text" name="discription" required style="height: 50px; width:200px">
                            <input type="hidden" name="ikar_id" value="{{ $ikar_id }}">
                        </div>
                        <div>
                            <button class="supmit">rating</button>
                        </div>
                    </form>
                </div>
                <div class="details">
                    <div class="content" style="display: flex; flex-direction: column; gap: 10px; width:100%">
                        <h2>user rating</h2>
                        @foreach ($rating as $item)
                            <div style="    border-radius: 20px;background-color: #80808014;padding: 10px 15px;">
                                <p><span>{{ $item->user->name }}</span></p>
                                @for ($count = 1; $count <= $item->rating; $count++)
                                    <span style="color: gold">&#9733;</span>
                                @endfor
                                @for ($j = $item->rating; $j < 5; $j++)
                                    <span>&#9733;</span>
                                @endfor
                                <p>{{ $item->discription }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
