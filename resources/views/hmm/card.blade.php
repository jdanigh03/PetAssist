@extends('layouts.app')

@section('title', 'Historial Médico')

@section('content')

    <style>
        .container-hmm {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        h1 {
            padding-top: 100px;
            text-align: center;
            color: #2f4f4f;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .card {
            display: flex;
            align-items: center;
            border-radius: 10px;
            padding: 15px;
            width: calc(50% - 10px);
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #f5f5dc;
            text-decoration: none;
            color: #2f4f4f;
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-right: 15px;
        }

        .card-content {}

        .card h2 {
            font-size: 1.2rem;
            margin: 0 0 0.5rem 0;
            color: #2f4f4f;
        }

        .card p {
            font-size: 1rem;
            margin: 0;
            color: #333;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            background-color: #e6f2ff;
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
                flex-direction: column;
                align-items: center;
            }

            .card img {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }

        .no-citas {
            text-align: center;
            font-style: italic;
            color: #555;
        }
    </style>


    <h1>Historial médico de {{ $mascota->nombre }}</h1>
    <div class="container-hmm">

        @if ($citas->count() > 0)
            @foreach ($citas as $cita)
                <a href="{{ route('detalles.cita', $cita->id) }}" class="card">
                    <img src="{{ $mascota->foto }}" alt="Imagen de {{ $mascota->nombre }}"
                        onerror="this.src='/img/perfilPredeterminadoMascota.png'">
                    <div class="card-content">
                        <h2>Cita del {{ $cita->fecha_formateada }} a las {{ $cita->hora_formateada }}</h2>
                        <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
                        <p><strong>Veterinario:</strong> {{ $cita->veterinario->name ?? 'No asignado' }}</p>
                    </div>
                </a>
            @endforeach
        @else
            <p class="no-citas">No hay citas registradas para esta mascota.</p>
            <div class="container-mascotas">
                <a href="/nueva-mascota" class="boton-nueva-mascota">Nueva mascota</a>
            </div>
        @endif
    </div>

@endsection
