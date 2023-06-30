@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <div class="conteners">
                <div class="title">Add Ikar</div>
                <form action="{{ route('user.update', [$ikar->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <i class="las la-city"></i>
                            <span class="details">City</span>
                            <input type="text" name="city" placeholder="Enter the city" autocomplete="off"
                                value="{{ $ikar->city }}">
                            @error('city')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-tty"></i>
                            <span class="details">Region</span>
                            <input type="text" name="region" placeholder="Enter the region"
                                autocomplete="off"value="{{ $ikar->region }}">
                            @error('region')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-braille"></i>
                            <span class="details">Address</span>
                            <input type="text" name="address" placeholder="Enter the address" autocomplete="off"
                                value="{{ $ikar->address }}">
                            @error('address')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-bell"></i>
                            <span class="details">Room number</span>
                            <input type="text" name="room_number" placeholder="Entre the room" autocomplete="off"
                                value="{{ $ikar->room_number }}">
                            @error('room_number')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-truck"></i>
                            <span class="details">Space</span>
                            <input type="text" name="space" placeholder="Enter the space" autocomplete="off"
                                value="{{ $ikar->space }}">
                            @error('space')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-wind"></i>
                            <span class="details">Price</span>
                            <input type="text" name="price" placeholder="Enter the price" autocomplete="off"
                                value="{{ $ikar->price }}">
                            @error('price')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-beer"></i>
                            <span class="details">Floor number</span>
                            <input type="text" name="floors_number" placeholder="Enter the price" autocomplete="off"
                                value="{{ $ikar->floors_number }}">
                            @error('floors_number')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-car"></i>
                            <select name="type" id="">
                                <option value="{{ $ikar->show_type }}">{{ $ikar->show_type }}</option>
                                <option value="buy">buy</option>
                                <option value="rent">rent</option>
                            </select>
                            @error('type')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="lab la-apple"></i>
                            <span class="details">Image</span>
                            <input type="file" name="img" placeholder="Enter the image">
                            @error('img')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="SAVE">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
