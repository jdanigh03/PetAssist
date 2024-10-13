@extends('layouts.app')

@section('title', 'Historial Médico')

@section('content')

<link rel="stylesheet" href="{{ asset('css/cards.css') }}"> 

<div class="container-hmm">
    <h1>Historial médico de la mascota</h1>

    <a href="{{ url('/historial-detallado-mascota') }}" class="card">
        <img src="https://via.placeholder.com/80" alt="Imagen mascota">
        <div class="card-content">
            <h2>Cita 1</h2>
            <p>Fecha: </p>
            <p>Motivo: </p>
        </div>
    </a>

    <a href="{{ url('/historial-detallado-mascota') }}" class="card">
        <img src="https://via.placeholder.com/80" alt="Imagen mascota">
        <div class="card-content">
            <h2>Cita 2</h2>
            <p>Edad: </p>
            <p>Motivo: </p>
        </div>
    </a>

    <a href="{{ url('/historial-detallado-mascota') }}" class="card">
        <img src="https://via.placeholder.com/80" alt="Imagen mascota">
        <div class="card-content">
            <h2>Cita 3</h2>
            <p>Edad: </p>
            <p>Motivo: </p>
        </div>
    </a>
</div>

@endsection
