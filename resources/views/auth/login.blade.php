@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            flex-grow: 1;
            background-color: #f5f5dc;
            padding: 2rem;
            margin: 20px;
            margin-top: 400px;
            margin-bottom: 60px;
            padding-top: 0;
        }

        .login-title {
            color: #2f4f4f;
        }

        .login-input {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #2f4f4f;
        }

        .error-message {
            border: 1px solid #ff0000;
            background-color: #ffe6e6;
            color: #ff0000;
            padding: 0.75rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }

        .separator {
            text-align: center;
            margin: 1.5rem 0;
        }

        .separator span {
            color: #2f4f4f;
        }


        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-self: stretch;

        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            width: 180px;
            height: 50px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #1f3f3f;
        }


        .logo-petassist {
            display: block;
            margin: 1rem auto;
            max-width: 200px;
            height: auto;
            border-radius: 20px;
        }
    </style>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <h1 class="text-3xl text-center font-bold login-title">Inicia sesión con el sistema PetAssist</h1>
            <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de PetAssist" class="logo-petassist">
            <input type="email" placeholder="Email" id="email" name="email" required class="login-input">

            <input type="password" placeholder="Password" id="password" name="password" required class="login-input">

            @error('message')
                <p class="error-message">
                    * {{ $message }}
                </p>
            @enderror

            <a href="/petshop">
                <button type="submit" class="btn">
                    Enviar
                </button>
            </a>
        </form>
    </div>

@endsection
