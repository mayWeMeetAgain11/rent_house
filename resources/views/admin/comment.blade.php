{{-- @extends('layouts.saidbar')
@section('contents')
    <div class="containers">
        <div class="imgboxs">
            <img src="{{ asset('uploads/rating/' . $rating->photo->image) }}">
        </div>
        <div class="details">
            <div class="content">
                <h2>type: {{ $rating->type }}</h2>
                <p>city: <span>{{ $rating->city }}</span></p>
                <p>region: <span>{{ $rating->region }}</span></p>
                <p>address: <span>{{ $rating->address }}</span></p>
                <p>property: <span>{{ $rating->show_type }}</span></p>
                <p>space: <span>{{ $rating->space }}</span></p>
                <p>floor: <span>{{ $rating->floors_number }}</span></p>
                <p>room: <span>{{ $rating->room_number }}</span></p>
                <p>name: <span>{{ $rating->user->name }}</span></p>
                <p>phone: <span>{{ $rating->user->phone }}</span></p>
                <h3>price:{{ $rating->price }}</h3>
                <a href="{{ route('user.create.comment', [$rating->id]) }}">
                    <button>comment</button>
                </a>
                <form action="{{ route('user.request.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="owner_id" value="{{ $rating->user->id }}">
                    <input type="hidden" name="ikar_id" value="{{ $rating->id }}">
                    <input type="hidden" name="last_date" value="{{ now() }}">
                    <button class="supmit">request</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="progect">
        <div class="card">
            <div class="card-header">
                <h3>House</h3>
            </div>
            <div class="card-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>
                                <i class="las la-city"></i>
                                ID
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                city
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                address
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                email
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                rating
                            </td>
                            <td>
                                <i class="las la-city"></i>
                                review
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rating as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['ikar']['city'] }}</td>
                                <td>{{ $item['ikar']['address'] }}</td>
                                <td>{{ $item['user']['email'] }}</td>
                                <td>{{ $item['rating'] }}</td>
                                <td>{{ $item['discription'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
