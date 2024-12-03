@extends('layouts.app')

@section('title', 'Recepcionista Dashboard')

<style>
    .home-recepcionista {
        text-align: center;
        padding: 20px;
        margin-top: 90px;
        padding-bottom: 120px;
        min-height: calc(100vh - 160px);
    }
</style>

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="home-recepcionista">
        <h1>Bienvenido a PetAssist, recepcionista</h1>

        <div class="categorias">
            <!-- Botón para Control de clientes -->
            <a href="/control-clientes">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Control de clientes">
                </div>
                Control de clientes
            </a>

            <!-- Botón para Control de citas -->
            <a href="/control-citas">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Control de citas">
                </div>
                Control de citas
            </a>

            <!-- Botón para Reservar citas -->
            <a href="/reservar-cita">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Reservar citas">
                </div>
                Reservar citas
            </a>
        </div>
    </div>

@endsection
