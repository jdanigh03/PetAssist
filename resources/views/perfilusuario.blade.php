@extends('layouts.app')

@section('title', 'home')

@section('content')

    <style>
        .container-perfil {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            margin-top: 70px;
            margin-bottom: 20px;
            padding: 20px;
            overflow-y: auto;
            padding-bottom: 50px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }

        .profile-header {
            position: relative;
            background-color: #F5F5DC;
            padding: 20px;
            text-align: center;
        }

        .profile-header2 {
            background-color: #F5F5DC;
            padding: 10px;
            flex-wrap: wrap;
            justify-content: center;
            display: flex;
        }

        .profile-image-mascota {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .profile-image-mascota2 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .profile-name {
            font-size: 20px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .profile-info {
            padding: 20px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .profile-info p strong {
            font-weight: bold;
        }

        .btn {
            display: flex;
            background-color: #2F4F4F;
            color: #FFFFFF;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #556B2F;
        }

        .mascota-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 150px;
        }

        .editar-boton {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            padding: 0;
            cursor: pointer;
        }

        .editar-boton img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            /* Haz que la imagen también sea redonda */
            object-fit: cover;
            /* Asegura que la imagen se ajuste correctamente */
        }

        .mascota-boton {
            background-color: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .mascota-boton img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .no-mascotas {
            text-align: center;
            /* Centrar el texto */
            margin-top: 2rem;
        }
    </style>

    <div class="container-perfil">
        <h1>Perfil</h1>
        <div class="profile-card">
            <div class="profile-header">
                <a href="/editarperfilusuario">
                    <button class="editar-boton">
                        <img src="https://img.freepik.com/vector-premium/lapiz-vector-icono-plano_570429-16516.jpg"
                            alt="Editar">
                    </button>
                </a>
                <img src="{{ $user->profile_picture ?? '/img/perfilPredeterminado.png' }}" alt="Foto de perfil del usuario"
                    class="profile-image-mascota" onerror="this.src='/img/perfilPredeterminado.png'">
                <h1 class="profile-name">{{ $user->name }}</h1>
            </div>
            <div class="profile-info">
                <p><strong>Dirección:</strong> {{ $user->direccion }}</p>
                <p><strong>Teléfono de referencia:</strong> {{ $user->telefono }}</p>
                <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
            </div>

            <div class="profile-header">
                <h1 class="profile-name">Mascotas</h1>
            </div>

            <div class="profile-header2">
                @if ($user->mascotas->count() > 0)
                    @foreach ($user->mascotas as $mascota)
                        <div class="mascota-item">
                            <a href="{{ route('mascotas.perfil', $mascota) }}">
                                <button class="mascota-boton">
                                    <img src="{{ $mascota->foto }}" alt="Foto de {{ $mascota->nombre }}"
                                        class="profile-image-mascota2" onerror="this.src='/img/perfilPredeterminado.png'">
                                </button>
                            </a>
                            <h1 class="profile-name">{{ $mascota->nombre }}</h1>
                        </div>
                    @endforeach
                @else
                    <div class="no-mascotas">
                        <p>No tienes mascotas añadidas. ¿Deseas añadir una?</p>
                        <a href="{{ route('mascotas.crear') }}" class="btn">Añadir Mascota</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
