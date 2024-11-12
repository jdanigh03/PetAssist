@extends('layouts.app')

@section('title', 'Citas Agendadas')

@section('content')

    <style>
        .container-citas {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            overflow-y: auto;
            padding-bottom: 50px;
        }

        .container-info-citasagenda {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            background-color: #f5f5dc;
            padding: 20px;
            border: 2px solid #2f4f4f;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        .card-cita {
            background-color: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: calc(33.33% - 20px);
            box-sizing: border-box;

        }

        .cita-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .mascota-foto {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        @media (max-width: 900px) {

            .card-cita {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {

            .card-cita {
                width: 100%;
            }
        }
    </style>


    <div class="container-citas">
        <h1>Citas Agendadas</h1>

        <div class="container-info-citasagenda">
            @if ($citas->count() > 0)
                @foreach ($citas as $cita)
                    <div class="card-cita">
                        <div class="cita-header">
                            <h2>Mascota: {{ $cita->mascota->Nombre }}</h2>
                            <img src="{{ $cita->mascota->foto }}" alt="Foto de {{ $cita->mascota->Nombre }}"
                                class="mascota-foto" onerror="this.src='/img/perfilPredeterminado.png'">
                        </div>
                        <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                        <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                        <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
                        <p><strong>Veterinario:</strong> {{ $cita->veterinario?->name ?? 'No asignado' }}</p>
                    </div>
                @endforeach
            @else
                <p>No tienes citas agendadas por el momento.</p>
            @endif
        </div>
    </div>

@endsection
