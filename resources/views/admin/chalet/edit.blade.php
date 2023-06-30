@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="conteners">
        <div class="title">Update chalet</div>
        <form action="{{ route('admin.chalet.update', [$chalet->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name="city" placeholder="" value="{{ $chalet->city }}" required>
                    @error('city')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Region</span>
                    <input type="text" name="region" placeholder="" value="{{ $chalet->region }}" required>
                    @error('region')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" placeholder="" value="{{ $chalet->address }}" required>
                    @error('address')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Room number</span>
                    <input type="text" name="room_number" placeholder="" value="{{ $chalet->room_number }}" required>
                    @error('room_number')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="text" name="phone" placeholder="" value="{{ $chalet->user->phone }}" required>
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Space</span>
                    <input type="text" name="space" placeholder="" value="{{ $chalet->space }}" required>
                    @error('space')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Price</span>
                    <input type="text" name="price" placeholder="" value="{{ $chalet->price }}" required>
                    @error('price')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Floor number</span>
                    <input type="text" name="floors_number" placeholder="" value="{{ $chalet->floors_number }}"
                        required>
                    @error('floors_number')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Type</span>
                    <select name="type" id="">
                        <option value="{{ $chalet->show_type }}">{{ $chalet->show_type }}</option>
                        <option value="buy">buy</option>
                        <option value="rent">rent</option>
                    </select>
                    @error('type')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Image</span>
                    <input type="file" name="img" placeholder="" value="{{ $chalet->img }}">
                    @error('img')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="button">
                <input type="submit" value="UPDATE">
            </div>
        </form>
    </div>
@endsection
