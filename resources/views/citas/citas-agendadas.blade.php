@extends('layouts.app')

@section('title', 'Nueva Citas Agendada')

@section('content')

<link rel="stylesheet" href="{{ asset('css/agendaCitas.css') }}">

<div class="container-agenda">
    <h1>Citas Agendadas</h1>

    @if ($citas->count() > 0)
        <div class="cards-container">
            @foreach($citas as $cita)
                <div class="card-cita">
                    <div class="cita-header">
                        <h2>Mascota: {{ $cita->mascota->Nombre }}</h2>
                        <img src="{{ $cita->mascota->foto }}" alt="Foto de {{ $cita->mascota->Nombre }}" class="mascota-foto" onerror="this.onerror='/img/perfilPredeterminadoMascota.png';">
                    </div>
                    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                    <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
                    <p><strong>Veterinario:</strong> {{ $cita->veterinario?->name ?? 'No asignado' }}</p> </div>
            @endforeach
        </div>
    @else
        <p>No tienes citas agendadas por el momento.</p>
    @endif
</div>

@endsection
