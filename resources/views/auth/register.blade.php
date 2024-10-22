@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<style>
    
    .container {
        max-width: 800px;
        margin: 4rem auto;
        background-color: #F5F5DC;
        padding: 2rem;
        border-radius: 8px;
        overflow-y: auto; /
    }

    h1 {
        color: #2F4F4F;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: stretch;
        grid-template-columns: 1fr;
        gap: 1rem;
    }


    .form-group {
        margin: 0;
    }



    input:focus {
        background-color: white;
        outline: none;
    }

    input::placeholder {
        color: #2F4F4F;
    }

    button {
        grid-column: span 2;
        background-color: #2F4F4F;
        color: white;
        padding: 0.75rem 2rem;
        font-size: 1.2rem;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #556B2F;
    }

    @media (min-width: 768px) {
        form {
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        button {
            grid-column: span 2;
        }
    }

    .error-message {
        border: 1px solid red;
        border-radius: 5px;
        background-color: #FFE0E0;
        color: red;
        padding: 0.5rem;
    }

    body {
        overflow-y: auto;
    }
</style>

<div class="container">
    <h1 class="text-3xl text-center font-bold">Registro de Cliente</h1>
    
    <form class="mt-4" method="POST" action="">
        @csrf

        <div class="form-group">
            <input type="text" placeholder="Nombre completo" id="name" name="name" required>
            @error('name')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" placeholder="Correo electrónico" id="email" name="email" required>
            @error('email')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="tel" placeholder="Teléfono" id="telefono" name="telefono" required>
            @error('telefono')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" placeholder="Dirección" id="direccion" name="direccion" required>
            @error('direccion')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" placeholder="Contraseña" id="password" name="password" required>
            @error('password')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</div>

@endsection
