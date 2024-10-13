@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container" style="background-color: #F5F5DC; padding: 2rem;">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <h1 class="text-3xl text-center font-bold" style="color: #2F4F4F;">Login</h1>
            <input type="email" placeholder="Email" id="email" name="email" required
                style="width: 100%; padding: 0.5rem; margin: 0.5rem 0; border: 1px solid #2F4F4F;">

            <input type="password" placeholder="Password" id="password" name="password" required
                style="width: 100%; padding: 0.5rem; margin: 0.5rem 0; border: 1px solid #2F4F4F;">

            @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                    * {{ $message }}
                </p>
            @enderror

            <button type="submit"
                class="botonverde"
                style="background-color: #2F4F4F; color: #FFFFFF; padding: 0.75rem 2rem; border-radius: 5px; border: none;">
                Enviar
            </button>
        </form>
        <div class="separator" style="text-align: center; margin: 1.5rem 0;">
            <span style="color: #2F4F4F;">-- ó --</span>
        </div>
        <a href="#" class="google-button" style="display: flex; justify-content: center; align-items: center; padding: 0.75rem; background-color: #FFFFFF; border: 1px solid #2F4F4F; color: #2F4F4F; text-decoration: none; border-radius: 5px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/768px-Google_%22G%22_logo.svg.png"
                alt="Google logo" style="height: 20px; margin-right: 0.5rem;">
            Iniciar sesión con Google
        </a>
    </div>
@endsection
