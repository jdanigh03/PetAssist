@extends('layouts.app')

@section('title', 'Consultar Historial Médico')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/consultarHistorialMascota.css') }}">
    <style>
        .container-historial {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2rem;
            margin-top: 100px;
        }

        .search-bar {
            display: flex;
            margin-bottom: 20px;
            align-items: center;
        }

        .search-bar input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            height: 60px;
        }

        .search-bar button {
            padding: 8px 15px;
            background-color: #2f4f4f;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height: 60px;
        }

        .search-bar button:hover {
            background-color: #1f3f3f;
        }

        .card-mascota {
            background-color: #fff;
            border: 2px solid #2f4f4f;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
        }

        .mascota-foto {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 20px;
        }

        .details {
            flex: 1;
        }

        .details p {
            margin: 0.2rem 0;
            color: #333;
        }

        .details p strong {
            font-weight: bold;
            color: #2f4f4f;
        }

        .card-link:hover {
            text-decoration: none;
        }

        .card-link:hover .card-mascota {
            background-color: #f0f0f0;
        }



        @media (max-width: 600px) {
            .card-mascota {
                flex-direction: column;
                align-items: center;
            }

            .mascota-foto {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
    <div class="container-historial">
        <h1>Consultar Historial Médico</h1>

        <form action="{{ route('veterinario.consultarHistorial') }}" method="GET">
            <div class="search-bar">
                <input type="text" id="search" name="search" placeholder="Buscar mascota por nombre o ID..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn-search">Buscar</button>
            </div>
        </form>


        @if ($mascotas->count() > 0)
            @foreach ($mascotas as $mascota)
                <a href="{{ route('historial.medico', $mascota->id) }}" class="card-link">
                    <div class="card-mascota">
                        <img src="{{ $mascota->foto }}" alt="Foto de {{ $mascota->nombre }}" class="mascota-foto"
                            onerror="this.src='/img/perfilPredeterminadoMascota.png';">
                        <div class="details">
                            <h2>{{ $mascota->nombre }}</h2>
                            <p><strong>Edad:</strong> {{ $mascota->edad_string }}</p>
                            <p><strong>Raza:</strong> {{ $mascota->raza->nombre }}</p>
                            <p><strong>Especie:</strong> {{ $mascota->raza->especie->nombre }}</p>
                            <p><strong>Dueño:</strong> {{ $mascota->user->name }}</p>
                        </div>
                    </div>
            @endforeach
        @else
            <p>No se encontraron mascotas.</p>
        @endif

    </div>

@endsection
