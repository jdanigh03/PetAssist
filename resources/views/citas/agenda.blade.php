@extends('layouts.app')

@section('title', 'Agenda de Citas')

@section('content')

<link rel="stylesheet" href="{{ asset('css/agenda.css') }}">

<div class="container-agenda">
    <h1>Agenda de Citas</h1>

    <!-- Botones de acción -->
    <div class="btn-group">
        <a href="{{ route('citas.reservar') }}" class="btn-reservar-cita">Reservar Cita</a>
        <a href="{{ route('citas.agendadas') }}" class="btn-citas-agendadas">Ver Citas Agendadas</a>
    </div>
</div>

@endsection
