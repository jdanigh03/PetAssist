@extends('layouts.app')

@section('title', 'Nueva Citas Agendada')

@section('content')

<div class="container-agenda">
    <h1>Citas Agendadas</h1>

    <!-- Mostrar las citas si hay alguna -->
    @if ($citas->count() > 0)
        <div class="cards-container">
            @foreach($citas as $cita)
                <div class="card-cita">
                    <div class="cita-header">
                        <h2>Mascota: {{ $cita->mascota }}</h2>
                        <img src="https://via.placeholder.com/80" alt="Foto de {{ $cita->mascota }}" class="mascota-foto">
                    </div>
                    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                    <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
                    <p><strong>Veterinario:</strong> {{ $cita->veterinario }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No tienes citas agendadas por el momento.</p>
    @endif
</div>

@endsection
