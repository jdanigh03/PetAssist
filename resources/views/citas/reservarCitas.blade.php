@extends('layouts.app')

@section('title', 'Reservar Cita Médica')

@section('content')
<link rel="stylesheet" href="{{ asset('css/reservarCitas.css') }}">
<style>
    .no-mascotas {
        text-align: center;
        margin-top: 2rem; /* Espacio superior */
    }
</style>
<div class="container-reserva">
    <h1>Reservar Cita Médica</h1>

    @if ($mascotas->count() > 0) 
        <form action="{{ route('citas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="mascota">Selecciona la mascota:</label>
                <select id="mascota" name="mascota" required>
                    <option value="">Selecciona una opción</option>
                    @foreach ($mascotas as $mascota)
                        <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-group">
                <div class="form-group">
                    <label for="fecha">Selecciona la fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>

                <div class="form-group">
                    <label for="hora">Selecciona la hora:</label>
                    <input type="time" id="hora" name="hora" required>
                </div>
            </div>


            <div class="form-group">
                <label for="motivo">Motivo de la cita:</label>
                <textarea id="motivo" name="motivo" rows="3" placeholder="Describe el motivo de la cita" required></textarea>
            </div>

            <div class="form-group">
                <label for="veterinario">Selecciona un veterinario (opcional):</label>
                <select id="veterinario" name="veterinario">
                    <option value="">Cualquiera disponible</option>
                    @foreach ($veterinarios as $veterinario)
                        <option value="{{ $veterinario->id }}">{{ $veterinario->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn-reservar">Reservar Cita</button>
        </form>
    @else
        <div class="no-mascotas">
            <p>No tienes mascotas, añade una <a href="{{ route('mascotas.crear') }}">aquí</a>.</p> 
        </div>
    @endif

</div>

@endsection