@extends('layouts.app')

@section('title', 'Historial Médico')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">

    <h1>Historial médico de {{ $mascota->nombre }}</h1>
    <div class="container-hmm">
        @if ($citas->count() > 0)
            @foreach ($citas as $cita)
                <a href="{{ route('detalles.cita', $cita->id) }}" class="card"> </a>

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
            <p>No hay citas registradas para esta mascota.</p>
        @endif
    </div>

@endsection
