@extends('layouts.app')

@section('title', 'Detalle de la Cita')

@section('content')

<link rel="stylesheet" href="{{ asset('css/detallesCita.css') }}">

<div class="container-detalle">
    <div class="card-detalle">
        <img src="https://via.placeholder.com/150" alt="Imagen de la mascota" class="foto-mascota">
        <div class="detalle-content">
            <h2>Cita para Control General</h2>
            <p><strong>Fecha:</strong> 12 de Octubre, 2024</p>
            <p><strong>Motivo:</strong> Control general y chequeo de vacunas</p>
            <p><strong>Veterinario a cargo:</strong> Dr. Juan Pérez</p>
            <p><strong>Tratamiento:</strong> Aplicación de vacunas, control de peso</p>
            <p><strong>Medicamentos:</strong> Vacuna antirrábica, desparasitante</p>
            <p><strong>Observaciones:</strong> Mascota en buen estado general, continuar con dieta indicada</p>
            <p><strong>Pruebas Realizadas:</strong> Ninguna</p>
        </div>
    </div>
</div>

@endsection
