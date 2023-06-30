@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="conteners">
        <div class="title">Add User</div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Name</span>
                    <input type="text" name="name" placeholder="Enter the name" autocomplete="off">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Username</span>
                    <input type="text" name="user_name" placeholder="Entre the password" autocomplete="off">
                    @error('user_name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Phone</span>
                    <input type="text" name="phone" placeholder="Enter the phone" autocomplete="off">
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter the email" autocomplete="off">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Password</span>
                    <input type="text" name="password" placeholder="Entre the password" autocomplete="off">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <i class="las la-car"></i>
                    <span class="details">Role</span>
                    <select name="role" id="">
                        <option disabled selected>role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="SAVE">
            </div>
        </form>
    </div>
@endsection
