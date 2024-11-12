@extends('layouts.app')

@section('title', 'Consultar Historial Médico')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/consultarHistorialMascota.css') }}">
    <style>
        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            /* Esquinas redondeadas a la izquierda */
        }

        .search-bar button {
            padding: 8px 15px;
            background-color: #2f4f4f;
            /* Color de fondo */
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            /* Esquinas redondeadas a la derecha */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #1f3f3f;
            /* Color de fondo más oscuro al pasar el mouse */
        }

        .card-mascota {
            background-color: #fff;
            border: 2px solid #2f4f4f;
            /* Borde --primary */
            border-radius: 8px;
            padding: 1.5rem;
            /* Padding consistente */
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            /* Para alinear la imagen y los detalles */
            align-items: flex-start;
            /* Alinea la imagen al inicio del contenedor */
        }

        .mascota-foto {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 20px;
            /* Espacio entre la imagen y los detalles */
        }

        .details {
            flex: 1;
            /* Para que los detalles ocupen el espacio restante */
        }

        .details p {
            margin: 0.2rem 0;
            /* Margen reducido entre párrafos */
            color: #333;
        }

        .details p strong {
            font-weight: bold;
            color: #2f4f4f;
            /* Color del texto resaltado */
        }

        .card-link:hover {
            text-decoration: none;
            /* Evita el subrayado al pasar el mouse */
        }

        .card-link:hover .card-mascota {
            background-color: #f0f0f0;
            /* Cambia el color de fondo al pasar el mouse */
        }



        @media (max-width: 600px) {
            .card-mascota {
                flex-direction: column;
                /* Imagen arriba, detalles abajo */
                align-items: center;
                /* Centrar la imagen */
            }

            .mascota-foto {
                margin-right: 0;
                margin-bottom: 1rem;
                /* Espacio inferior para la imagen en pantallas pequeñas */
            }
        }
    </style>
    <div class="container-historial">
        <h1>Consultar Historial Médico</h1>

        <div class="search-bar">
            <input type="text" id="search" name="search" placeholder="Buscar mascota por nombre o ID..." required>
            <button type="submit" class="btn-search">Buscar</button>
        </div>


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
