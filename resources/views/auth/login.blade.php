@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <h1 class="text-3xl text-center font-bold">Login</h1>
            <input type="email" placeholder="Email" id="email" name="email" required>

            <input type="password" placeholder="Password" id="password" name="password" required>

            @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}
                </p>
            @enderror

            <button type="submit"
                class="botonverde">Enviar</button>
        </form>
        <div class="separator">
          <span>--ó--</span>
      </div>
      <a href="#" class="google-button">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/768px-Google_%22G%22_logo.svg.png"
              alt="Google logo">
          Iniciar sesión con Google
      </a>


    </div>
@endsection
