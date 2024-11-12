@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="home-cliente">
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
        <a href="/control-clientes">
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
