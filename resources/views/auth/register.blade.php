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
        overflow-y: auto;
    }

    h1 {
        color: #2F4F4F;
        text-align: center; /* Centrar el título */
    }

    h2 {
        color: #2F4F4F;
        text-align: center; /* Centrar el subtítulo */
        grid-column: span 2; /* Que el h2 ocupe las dos columnas */
        margin-bottom: 1rem; /* Agregar un margen inferior */
    }

    .container form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Ajustar a dos columnas */
        gap: 1rem;
        align-items: start; /* Alinear elementos al inicio */
    }

    .form-group {
        display: flex; /* Para alinear label e input */
        flex-direction: column; /* Label encima del input */
    }

    .form-group label {
        margin-bottom: 0.5rem;
        color: #2F4F4F; /* Color para las etiquetas */
    }

    input, select { /* Estilos para inputs y selects */
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff; /* Fondo blanco para inputs */
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
        margin-top: 1rem; /* Agregar margen superior */
    }

    button:hover {
        background-color: #556B2F;
    }


    .error-message {
        border: 1px solid red;
        border-radius: 5px;
        background-color: #FFE0E0;
        color: red;
        padding: 0.5rem;
        grid-column: span 1; /* Ajusta la columna del mensaje de error */
        margin-top: 0.2rem;
    }

</style>

<div class="container">
    <h1 >Regístrate al sistema PetAssis para acceder a los diferentes servicios que ofrecemos</h1>
    

    <form class="mt-4" method="POST" action="">
        @csrf

        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Nombre completo" required>
            @error('name')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
            @error('email')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
            @error('telefono')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
            @error('direccion')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <h2>La contraseña debe contener 8 letras o números</h2>

        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            @error('password')        
                <p class="error-message">* {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</div>

@endsection