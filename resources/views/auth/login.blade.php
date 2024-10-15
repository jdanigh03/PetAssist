@extends('layouts.app')

@section('title', 'Login')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="container">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <h1 class="text-3xl text-center font-bold login-title">Login</h1>
            <input type="email" placeholder="Email" id="email" name="email" required class="login-input">

            <input type="password" placeholder="Password" id="password" name="password" required class="login-input">

            @error('message')
                <p class="error-message">
                    * {{ $message }}
                </p>
            @enderror

            <button type="submit" class="btn-submit">
                Enviar
            </button>
        </form>
    </div>
@endsection
