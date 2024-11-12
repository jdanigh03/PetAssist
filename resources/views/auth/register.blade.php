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
            text-align: center;
        }

        .container form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: start;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            color: #2F4F4F;
        }

        input,
        select {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
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
            margin-top: 1rem;
        }

        button:hover {
            background-color: #556B2F;
        }

        #preview-predeterminada {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .error-message {
            border: 1px solid red;
            border-radius: 5px;
            background-color: #FFE0E0;
            color: red;
            padding: 0.5rem;
            grid-column: span 1;
            margin-top: 0.2rem;
        }

        .profile-section {
            grid-column: span 2;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        .profile-section h3 {
            margin-bottom: 1rem;
            color: #2F4F4F;
        }

        .profile-option {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
    </style>

    <div class="container">
        <h1>Regístrate al sistema PetAssist para acceder a los diferentes servicios que ofrecemos</h1>

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

            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <small class="text-muted">La contraseña debe contener al menos 8 caracteres.</small>
                @error('password')
                    <p class="error-message">* {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>
                <small class="text-muted">Las contraseñas deben coincidir.</small>
            </div>

            <!-- Sección de foto de perfil -->
            <div class="profile-section">
                <h3>Foto de perfil:</h3>
                <div class="profile-option">
                    <input type="radio" name="tipo_imagen" id="imagen_predeterminada_radio" value="predeterminada" checked>
                    <label for="imagen_predeterminada_radio">Imagen predeterminada</label>
                </div>
                <div id="contenedor-imagen-predeterminada">
                    <img id="preview-predeterminada" src="/img/perfilPredeterminado.png" alt="Imagen predeterminada">
                </div>

                <div class="profile-option">
                    <input type="radio" name="tipo_imagen" id="subir_imagen_radio" value="subir">
                    <label for="subir_imagen_radio">Subir archivo</label>
                </div>
                <div id="contenedor-subir-imagen" style="display: none;">
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                    <button type="button" id="btn-subir-imagen" class="boton-perfil">Subir Imagen</button>
                    <div id="imagen-preview"></div>
                    <input type="hidden" id="imagen-url" name="imagen_subida_url">
                </div>
            </div>

            <!-- Botón de envío -->
            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        const radioPredeterminada = document.getElementById('imagen_predeterminada_radio');
        const radioSubir = document.getElementById('subir_imagen_radio');
        const contenedorPredeterminada = document.getElementById('contenedor-imagen-predeterminada');
        const contenedorSubir = document.getElementById('contenedor-subir-imagen');

        radioPredeterminada.addEventListener('change', () => {
            contenedorPredeterminada.style.display = 'block';
            contenedorSubir.style.display = 'none';
        });

        radioSubir.addEventListener('change', () => {
            contenedorPredeterminada.style.display = 'none';
            contenedorSubir.style.display = 'block';
        });
    </script>

@endsection
