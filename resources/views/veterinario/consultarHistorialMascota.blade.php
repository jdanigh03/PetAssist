@extends('layouts.app')

@section('title', 'Consultar Historial Médico')

@section('content')

<link rel="stylesheet" href="{{ asset('css/consultarHistorialMascota.css') }}">

<div class="container-historial">
    <h1>Consultar Historial Médico</h1>

    <div class="search-bar">
        <input type="text" id="search" name="search" placeholder="Buscar mascota por nombre o ID..." required>
        <button type="submit" class="btn-search">Buscar</button>
    </div>

    <a href="{{ url('/ruta-de-destino') }}" class="card-link">
        <div class="card-mascota">
            <h2>Nombre mascota</h2>
            <div class="details">
                <p><strong>Edad:</strong> 3 años</p>
                <p><strong>Raza:</strong> Labrador</p>
                <p><strong>Sexo:</strong> Macho</p>
                <p><strong>Especie:</strong> Canino</p>
                <p><strong>Color:</strong> Negro</p>
                <p><strong>Peso:</strong> 25 kg</p>
                <p><strong>Dueñ@:</strong> Juan Pérez</p>
                <p><strong>Teléfono de referencia:</strong> +591 123 45678</p>
            </div>
        </div>
    </a>

</div>

@endsection
