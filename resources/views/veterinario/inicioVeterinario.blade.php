@extends('layouts.app')

@section('title', 'Inicio Veterinario')

@section('content')

<link rel="stylesheet" href="{{ asset('css/inicioVeterinario.css') }}">

<div class="container-panel">
    <h1>Bienvenido a <br> PetAssist Dr(a). Veterinario</h1>

    <div class="options">
        <a href="{{ url('/citas-agendadas') }}" class="option-card">
            <img src="{{ asset('img/citasMedicas.jpeg') }}" alt="Ver citas programadas">
            <p>Ver citas programadas</p>
        </a>
        
        <a href="{{ url('/ingresar-consulta') }}" class="option-card">
            <img src="{{ asset('img/anotarConsultas.jpeg') }}" alt="Ingresar consulta">
            <p>Ingresar consulta</p>
        </a>

        <a href="{{ url('/consultar-historial') }}" class="option-card">
            <img src="{{asset('img/consultarConsultas.jpeg')}}" alt="Consultar hmm">
            <p>Consultar historial médico de mascota</p>
        </a>
        <a href="{{ url('/ficha-clinica') }}" class="option-card">
            <img src="{{ asset('img/fichaClinica.jpeg') }}" alt="Ver ficha clínica">
            <p>Ver ficha clínica</p>
        </a>
    </div>  
</div>

@endsection
