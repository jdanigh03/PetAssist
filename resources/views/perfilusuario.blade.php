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
            display:flex;
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
            align-items: center; /* Centra la imagen y el texto */
            justify-content: center            
            background-color: #fff; /* Fondo blanco para cada item */
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 150px; /* Ancho de cada contenedor */
        }
        .editar-boton {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            padding: 0;
            cursor: pointer;
        }

        .editar-boton img {
            width: 100%;
            height: 100%;
            border-radius: 50%; /* Haz que la imagen también sea redonda */
            object-fit: cover; /* Asegura que la imagen se ajuste correctamente */
        }

    </style>

    <div class="container-perfil-mascota">
        <h1>Perfil</h1>
        <div class="profile-card">
            <div class="profile-header">
                <button class="editar-boton">
                    <img src="https://img.freepik.com/vector-premium/lapiz-vector-icono-plano_570429-16516.jpg" alt="Editar">
                </button>
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png"
                    alt="Foto de perfil de la mascota" class="profile-image-mascota">
                <h1 class="profile-name">Nombre del usuario</h1>
            </div>
            <div class="profile-info">
                <p><strong>Dirección del usuario</strong></p>
                <p><strong>Teléfono de referencia:</strong> </p>
                <p><strong>Correo electronico</strong> </p>
            </div>
            <div class="profile-header">
                <h1 class="profile-name">Mascotas</h1>
            </div>
            <div class="profile-header2">
                <div class="mascota-item">
                    <img src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                        alt="Foto de perfil de la mascota" class="profile-image-mascota2">    
                    <h1 class="profile-name">Nombre</h1>
                </div>
                <div class="mascota-item">
                    <img src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                        alt="Foto de perfil de la mascota" class="profile-image-mascota2">    
                    <h1 class="profile-name">Nombre</h1>
                </div>
                <div class="mascota-item">
                    <img src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                        alt="Foto de perfil de la mascota" class="profile-image-mascota2">    
                    <h1 class="profile-name">Nombre</h1>
                </div>
                <div class="mascota-item">
                    <img src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                        alt="Foto de perfil de la mascota" class="profile-image-mascota2">    
                    <h1 class="profile-name">Nombre</h1>
                </div>
            </div>
        </div>
    </div>

@endsection