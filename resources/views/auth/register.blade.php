@extends('layouts.master')
@section('content')
    <form method="POST" action="{{route('auth.register')}}">
        @csrf
        @method('POST')
        <div class="form w-[40%] shadow-2xl p-4 mt-4">
            <div class="company flex flex-row gap-2 bg-gray-300 py-3 px-2">
                <img class="rounded-full w-[40px] h-[40px]" src={{url("/icon.png")}}  alt="company-logo"/>
                <span class="font-semibold text-[1.1rem] self-center">Global shipping system (vagrant)</span>
            </div>

            <div class="form-group-text">
                <label for="username">Enter username:</label>
                <input type="text" id="username" name="name" class="form-control" value="{{old('name')}}"/>
                @error('username')
                <div class="text-red-400">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group-text">
                <label for="email">Enter email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}"/>
                @error('email')
                <div class="text-red-400">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group-text">
                <label for="password">Enter password:</label>
                <input type="password" id="password" name="password" class="form-control" />
                @error('password')
                <div class="text-red-400">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group-text">
                <label for="confirm-password">Confirm password:</label>
                <input type="password" id="confirm-password" name="password_confirmation" class="form-control" />
                @error('password_confirmation')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Submit</button>

            <a href="{{route('login')}}">Login</a>
        </div>
    </form>
@endsection
