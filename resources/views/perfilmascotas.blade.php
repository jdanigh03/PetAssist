@extends('layouts.app')

@section('title', 'home')

@section('content')
    <style>
        .container-perfil-mascota {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
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
            background-color: #F5F5DC;
            padding: 20px;
            text-align: center;
        }

        .profile-image-mascota {
            width: 150px;
            height: 150px;
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
            display: block;
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
    </style>

    <div class="container-perfil-mascota">
        <h1>Perfil de la Mascota</h1>
        <div class="profile-card">
            <div class="profile-header">
                <img src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="Foto de perfil de la mascota" class="profile-image-mascota">
                <h1 class="profile-name">Nombre mascota</h1>
            </div>
            <div class="profile-info">
                <p><strong>Edad:</strong> </p>
                <p><strong>Raza:</strong> </p>
                <p><strong>Sexo:</strong> </p>
                <p><strong>Especie:</strong> </p>
                <p><strong>Color:</strong> </p>
                <p><strong>Peso:</strong> </p>
                <p><strong>Dueñ@:</strong> </p>
                <p><strong>Teléfono de referencia:</strong> </p>
            </div>
            <div class="profile-button">
                <a href="/historial-medico-mascota" class="btn">Ver historial médico de la mascota</a>
            </div>
        </div>
    </div>
@endsection
