@extends('layouts.header')
@section('content')
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <div class="conteners">
                <div class="title">Add Ikar</div>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <i class="las la-city"></i>
                            <span class="details">City</span>
                            <input type="text" name="city" placeholder="Enter the city" autocomplete="off">
                            @error('city')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-tty"></i>
                            <span class="details">Region</span>
                            <input type="text" name="region" placeholder="Enter the region" autocomplete="off">
                            @error('region')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-braille"></i>
                            <span class="details">Address</span>
                            <input type="text" name="address" placeholder="Enter the address" autocomplete="off">
                            @error('address')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-bell"></i>
                            <span class="details">Room number</span>
                            <input type="text" name="room_number" placeholder="Entre the room" autocomplete="off">
                            @error('room_number')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-car"></i>
                            <span class="details">Type</span>
                            <select name="type" id="">
                                <option disabled selected>type</option>
                                <option value="rent">rent</option>
                                <option value="buy">buy</option>
                            </select>
                            @error('type')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-truck"></i>
                            <span class="details">Space</span>
                            <input type="text" name="space" placeholder="Enter the space" autocomplete="off">
                            @error('space')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-wind"></i>
                            <span class="details">Price</span>
                            <input type="text" name="price" placeholder="Enter the price" autocomplete="off">
                            @error('price')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-beer"></i>
                            <span class="details">Floor number</span>
                            <input type="text" name="floors_number" placeholder="Enter the price" autocomplete="off">
                            @error('floors_number')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="las la-car"></i>
                            <span class="details">Role</span>
                            <select name="ikar_type" id="">
                                <option disabled selected>ikar type</option>
                                <option value="house">House</option>
                                <option value="store">Store</option>
                                <option value="chalet">Chalet</option>
                            </select>
                            @error('ikar_type')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-box">
                            <i class="lab la-apple"></i>
                            <span class="details">Image</span>
                            <input type="file" name="img" placeholder="Enter the image">
                            @error('img')
                                <small style="color: red">{{ $message }}</small>
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
