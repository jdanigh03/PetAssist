@extends('layouts.app')

@section('title', 'Reservar Cita Médica')

@section('content')

<link rel="stylesheet" href="{{ asset('css/reservarCitas.css') }}">

<div class="container-reserva">
    <h1>Reservar Cita Médica</h1>

    <form action="{{ url('/reservar-cita') }}" method="POST">
        @csrf

        <!-- Selección de la mascota -->
        <div class="form-group">
            <label for="mascota">Selecciona la mascota:</label>
            <select id="mascota" name="mascota" required>
                <option value="">Selecciona una opción</option>
                <option value="1">Firulais</option>
                <option value="2">Pelusa</option>
            </select>
        </div>
        <div class="flex-group">
            <!-- Selección de fecha -->
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
                <option value="1">Dr. Juan Pérez</option>
                <option value="2">Dra. María López</option>
            </select>
        </div>
        <button type="submit" class="btn-reservar">Reservar Cita</button>
    </form>
</div>

@endsection
