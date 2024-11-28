@extends('layouts.app')

@section('title', 'Admin Dashboard')

<style>
    .home-admin {
        text-align: center;
        padding: 20px;
        margin-top: 90px;
        padding-bottom: 120px;
        min-height: calc(100vh - 160px);
    }
</style>

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="home-admin">
        <h1>Bienvenido a PetAssist administrador</h1>

        <div class="categorias">
            <!-- Botón para Control de inventario -->
            <a href="/control-inventario">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Control de inventario">
                </div>
                Control de inventario
            </a>

            <!-- Botón para Control de clientes -->
            <a href="/control-mascotas">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Control de clientes">
                </div>
                Control de clientes
            </a>

            <!-- Botón para Control de personal -->
            <a href="/control-personal">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Control de personal">
                </div>
                Control de personal
            </a>
        </div>
    </div>

@endsection
