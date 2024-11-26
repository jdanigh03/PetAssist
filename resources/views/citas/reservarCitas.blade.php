@extends('layouts.app')

@section('title', 'Reservar Cita Médica')

@section('content')
<link rel="stylesheet" href="{{ asset('css/reservarCitas.css') }}">
<style>
    .no-mascotas {
        text-align: center;
        margin-top: 2rem; /* Espacio superior */
    }
    .form-group input[type="date"] {
        appearance: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 0.5rem;
        font-size: 1rem;
        width: 100%;
        box-sizing: border-box;
    }
    .form-group input[type="time"] {
        appearance: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 0.5rem;
        font-size: 1rem;
        width: 100%;
        box-sizing: border-box;
    }
    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 0.5rem;
    }
    .form-group button {
        margin-top: 0.5rem;
        background-color: #6c63ff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 0.5rem 1rem;
        cursor: pointer;
    }
    .form-group button:hover {
        background-color: #5848c2;
    }
</style>
<div class="container-reserva">
    <h1>Reservar Cita Médica</h1>

    @if ($mascotas->count() > 0) 
        <form id="reservaForm" action="{{ route('citas.store') }}" method="POST">
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

<script>
    // Obtener la fecha actual en formato yyyy-mm-dd
    const today = new Date().toISOString().split("T")[0];
    
    // Asignar la fecha mínima para el campo de fecha
    document.getElementById("fecha").setAttribute("min", today);
    
    // Establecer la hora mínima (09:00) y máxima (17:00) para el campo de hora
    document.getElementById("hora").setAttribute("min", "09:00");
    document.getElementById("hora").setAttribute("max", "17:00");
</script>
@endsection
