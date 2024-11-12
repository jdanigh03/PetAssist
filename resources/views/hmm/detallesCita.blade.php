@extends('layouts.app')

@section('title', 'Detalle de la Cita')

@section('content')

<link rel="stylesheet" href="{{ asset('css/detallesCita.css') }}">
<style>
.foto-mascota { /* Agrega estilos para la imagen */
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }
</style>
<div class="container-detalle">
    <div class="card-detalle">
        <img src="{{ $cita->mascota->foto }}" alt="Imagen de la mascota" class="foto-mascota" onerror="this.src='/img/perfilPredeterminadoMascota.png'">
        <div class="detalle-content">
            <h2>Cita para {{ $cita->motivo }}</h2>
            <p><strong>Fecha:</strong> {{ $cita->fecha_formateada }}</p>
            <p><strong>Hora:</strong> {{ $cita->hora_formateada }}</p>
            <p><strong>Mascota:</strong> {{ $cita->mascota->nombre }}</p> <p><strong>Veterinario a cargo:</strong> {{ $cita->veterinario->name ?? 'No asignado' }}</p>
            <p><strong>Tratamiento:</strong> {{ $cita->detalle->tratamiento ?? 'No especificado' }}</p>
            <p><strong>Medicamentos:</strong> {{ $cita->detalle->medicamentos ?? 'No especificado' }}</p>
            <p><strong>Observaciones:</strong> {{ $cita->detalle->observaciones ?? 'No especificado' }}</p>
            <p><strong>Pruebas Realizadas:</strong> {{ $cita->detalle->pruebas_realizadas ?? 'No especificado' }}</p>
        </div>
    </div>
</div>

@endsection