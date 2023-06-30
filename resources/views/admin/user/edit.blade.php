@extends('layouts.saidbar')
@section('contents')
    {{-- @if ($message = Session::get('success'))
        <div class="alert">
            {{ $message }}
        </div>
    @endif --}}
    <div class="conteners">
        <div class="title">Add User</div>
        <form action="{{ route('admin.users.update', [$user->id]) }}" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter the name"
                        autocomplete="off">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="user_name" value="{{ $user->user_name }}" placeholder="Enter the name"
                        autocomplete="off">
                    @error('user_name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Phone</span>
                    <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter the phone"
                        autocomplete="off">
                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" value="{{ $user->email }}" placeholder="Enter the email"
                        autocomplete="off">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">role </span>
                    <select name="role">
                        <option
                            value="
                            @if ($user->group_by === 1) admin
                            @else
                            user @endif">
                            @if ($user->group_by === 1)
                                Admin
                            @else
                                User
                            @endif
                        </option>
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
