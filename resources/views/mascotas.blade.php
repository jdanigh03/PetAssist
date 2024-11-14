@extends('layouts.app')

@section('title', 'Mascotas')

@section('content')
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

        .container-mascotas {
            background-color: #f5f5dc;
            padding: 2rem;
            border-radius: 8px;
            min-width: 350px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #2f4f4f;
            text-align: center;
            margin-bottom: 20px;
        }

        .titulo-mascotas {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .mensaje-mascotas {
            color: #333;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .boton-nueva-mascota {
            display: inline-block;
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
            border: none;
        }

        .boton-nueva-mascota:hover {
            background-color: #1f3f3f;
        }

        .container-info-mascota {
            display: flex;
            flex-direction: row;
            background-color: #f5f5dc;
            padding: 1.5rem;
            margin-top: 20px;
            border: 2px solid #2f4f4f;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .foto-container {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .foto-mascota {
            width: 150px;
            height: auto;
            border-radius: 8px;
        }

        .info-mascota {
            display: flex;
            flex-direction: column;
            padding: 10px;
            flex: 1;
        }

        .info-mascota h2 {
            color: #333;
            margin-bottom: 0.5rem;
            margin-top: 0;
        }

        .info-mascota p {
            color: #333;
            margin: 0.2rem 0;
        }

        .btn-ver-mas {
            background-color: #2f4f4f;
            color: #FFFFFF;
            padding: 0.7rem 1rem;
            margin-top: 10px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-ver-mas:hover {
            background-color: #1f3f3f;
        }

        .mascotas-layout p {
            text-align: left;
        }

        .alert-success-mascota {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>

    <div class="mascotas-layout">
        <h1>Tus Mascotas</h1>

        @if (session('success'))
            <div class="alert alert-success-mascota">
                {{ session('success') }}
            </div>
        @endif

        @if ($mascotas->count() == 0)
            <div class="container-mascotas">
                <h2 class="titulo-mascotas">Agrega tus mascotas</h2>
                <p class="mensaje-mascotas">Al cargar a tus peludos, los verás aquí.</p>
                <a href="{{ route('mascotas.crear') }}" class="boton-nueva-mascota">Nueva mascota</a>
            </div>
        @else
            @foreach ($mascotas as $mascota)
                <div class="container-info-mascota">
                    <div class="foto-container">

                        <img class="foto-mascota" src="{{ $mascota->foto }}" alt="Foto de {{ $mascota->nombre }}"
                            onerror="this.src='/img/perfilPredeterminado.png'">

                        <a href="{{ route('mascotas.perfil', $mascota) }}" class="btn-ver-mas">Editar</a>


                        <form action="{{ route('mascotas.eliminar', $mascota) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que quieres borrar a {{ $mascota->nombre }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-ver-mas btn-eliminar">Eliminar</button>

                        </form>
                    </div>
                    <div class="info-mascota">
                        <h2>{{ $mascota->nombre }}</h2>
                        <p>Edad: {{ $mascota->edad_string }}</p>
                        <p>Raza: {{ $mascota->raza->nombre }}</p>
                        <p>Especie: {{ $mascota->raza->especie->nombre }}</p>
                    </div>
                </div>
            @endforeach


            <div class="container-mascotas">
                <a href="{{ route('mascotas.crear') }}" class="boton-nueva-mascota">Nueva mascota</a>
            </div>
        @endif
    </div>
@endsection
