@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="conteners">
        <div class="title">Add chalet</div>
        <form action="{{ route('admin.chalet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">City</span>
                    <input type="text" name="city" placeholder="Enter the city" required autocomplete="off">
                    @error('city')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Region</span>
                    <input type="text" name="region" placeholder="Enter the region" required autocomplete="off">
                    @error('region')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Address</span>
                    <input type="text" name="address" placeholder="Enter the address" required autocomplete="off">
                    @error('address')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Room number</span>
                    <input type="text" name="room_number" placeholder="Entre the room" required autocomplete="off">
                    @error('room_number')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Phone number</span>
                    <input type="text" name="phone" placeholder="Enter the number" required autocomplete="off">
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Space</span>
                    <input type="text" name="space" placeholder="Enter the space" required autocomplete="off">
                    @error('space')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Price</span>
                    <input type="text" name="price" placeholder="Enter the price" required autocomplete="off">
                    @error('price')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Floor number</span>
                    <input type="text" name="floors_number" placeholder="Enter the price" required autocomplete="off">
                    @error('floors_number')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Type</span>
                    <select name="type" id="">
                        <option disabled selected>type</option>
                        <option value="buy">buy</option>
                        <option value="rent">rent</option>
                    </select>
                    @error('type')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Image</span>
                    <input type="file" name="img" placeholder="Enter the image" required>
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
@endsection
