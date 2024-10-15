@extends('layouts.app')

@section('title', 'Citas Agendadas')

@section('content')

<link rel="stylesheet" href="{{ asset('css/citasAgendadas.css') }}">

<div class="container-citas">
    <h1>Citas Agendadas</h1>

    <div class="cards-container">

        <div class="card-cita">
            <div class="cita-header">
                <h2>Mascota: Firulais</h2>
                <img src="https://via.placeholder.com/80" alt="Foto de Firulais" class="mascota-foto"> <!-- Imagen de la mascota -->
            </div>
            <p><strong>Fecha:</strong> 20 de Octubre, 2024</p>
            <p><strong>Hora:</strong> 10:30 AM</p>
            <p><strong>Motivo:</strong> Vacunación</p>
            <p><strong>Veterinario:</strong> Dr. Juan Pérez</p>
        </div>

        <div class="card-cita">
            <div class="cita-header">
                <h2>Mascota: Pelusa</h2>
                <img src="https://via.placeholder.com/80" alt="Foto de Pelusa" class="mascota-foto"> <!-- Imagen de la mascota -->
            </div>
            <p><strong>Fecha:</strong> 22 de Octubre, 2024</p>
            <p><strong>Hora:</strong> 3:00 PM</p>
            <p><strong>Motivo:</strong> Revisión General</p>
            <p><strong>Veterinario:</strong> Dra. María López</p>
        </div>

    </div>
</div>

@endsection
