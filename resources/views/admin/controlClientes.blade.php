@extends('layouts.app')

@section('title', 'Control de Clientes')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="home-cliente">
    <h1>Control de Clientes</h1>
    <div class="categorias">
        <a href="/historialusuariosmodificar">
            <div class="container-img-adm">
                <img src="{{ asset('img/alimentos.png') }}" alt="Control de citas">
            </div>
            Control de citas
        </a>
        <a href="/historialusuarios">
            <div class="container-img-adm">
                <img src="{{ asset('img/accesorios.png') }}" alt="Historial de visitas">
            </div>
            Historial de visitas
        </a>
        <a href="/controldemascotas">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Control de mascotas">
            </div>
            Control de mascotas
        </a>
    </div>
</div>
@endsection
