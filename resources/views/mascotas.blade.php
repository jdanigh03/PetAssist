@extends('layouts.app')

@section('title', 'home')

@section('content')
    <title>PetAssist - Mascotas</title>
    <style>
        .mascotas-layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            overflow-y: auto;
            max-height: 100vh;
            padding-bottom: 100px;
        }

        .mascotas-layout .container-info-mascota {
            display: flex;
            flex-direction: row;
            background-color: #F5F5DC;
            padding: 10px;
            margin-top: 20px;
            border: 3px solid black;
            border-radius: 10%;
        }

        .foto-container {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .foto-mascota {
            width: 200px;
            height: auto;
            border-radius: 20%;
        }

        .info-mascota {
            display: flex;
            flex-direction: column;
            padding: 10px;
            flex: 1;
        }

        .info-mascota h2,
        .info-mascota p {
            margin: 5px 0;
        }

        .btn-ver-mas {
            background-color: #2F4F4F;
            color: #FFFFFF;
            padding: 0.7rem 1rem;
            margin-top: 10px;
            border-radius: 203px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid black;
        }

        .btn-ver-mas:hover {
            background-color: #556B2F;
        }

        .mascotas-layout p {
            text-align: left;
        }
    </style>

    <div class="mascotas-layout">
        <h1>Mascotas</h1>
        <div class="container-info-mascota">
            <div class="foto-container">
                <img class="foto-mascota"
                    src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="">
                <a href="/mascotas/perfil" class="btn-ver-mas">Ver más</a>
            </div>
            <div class="info-mascota">
                <h2>Nombre mascota</h2>
                <p>Edad:</p>
                <p>Raza:</p>
                <p>Sexo:</p>
                <p>Dueñ@:</p>
            </div>
        </div>
        <div class="container-info-mascota">
            <div class="foto-container">
                <img class="foto-mascota"
                    src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="">
                <a href="/mascotas/perfil" class="btn-ver-mas">Ver más</a>
            </div>
            <div class="info-mascota">
                <h2>Nombre mascota</h2>
                <p>Edad:</p>
                <p>Raza:</p>
                <p>Sexo:</p>
                <p>Dueñ@:</p>
            </div>
        </div>
        <div class="container-info-mascota">
            <div class="foto-container">
                <img class="foto-mascota"
                    src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="">
                <a href="/mascotas/perfil" class="btn-ver-mas">Ver más</a>
            </div>
            <div class="info-mascota">
                <h2>Nombre mascota</h2>
                <p>Edad:</p>
                <p>Raza:</p>
                <p>Sexo:</p>
                <p>Dueñ@:</p>
            </div>
        </div>
        <div class="container-info-mascota">
            <div class="foto-container">
                <img class="foto-mascota"
                    src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="">
                <a href="/mascotas/perfil" class="btn-ver-mas">Ver más</a>
            </div>
            <div class="info-mascota">
                <h2>Nombre mascota</h2>
                <p>Edad:</p>
                <p>Raza:</p>
                <p>Sexo:</p>
                <p>Dueñ@:</p>
            </div>
        </div>
        <div class="container-info-mascota">
            <div class="foto-container">
                <img class="foto-mascota"
                    src="https://media.istockphoto.com/id/513133900/es/foto/oro-retriever-sentado-en-frente-de-un-fondo-blanco.jpg?s=612x612&w=0&k=20&c=0lRWImB8Y4p6X6YGt06c6q8I3AqBgKD-OGQxjLCI5EY="
                    alt="">
                <a href="/mascotas/perfil" class="btn-ver-mas">Ver más</a>
            </div>
            <div class="info-mascota">
                <h2>Nombre mascota</h2>
                <p>Edad:</p>
                <p>Raza:</p>
                <p>Sexo:</p>
                <p>Dueñ@:</p>
            </div>
        </div>
    </div>

@endsection
