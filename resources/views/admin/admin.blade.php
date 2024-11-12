@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="home-cliente">
    <h1>Bienvenido a PetAssist administrador</h1>
  
    <h2>Control de inventario</h2>
    <div class="categorias">
        <a href="/aumentar-producto">
            <div class="container-img-adm">
                <img src="{{ asset('img/alimentos.png') }}" alt="Aumentar producto">
            </div>
            Aumentar producto
        </a>
        <a href="/quitar-producto">
            <div class="container-img-adm">
                <img src="{{ asset('img/accesorios.png') }}" alt="Quitar producto">
            </div>
            Quitar producto
        </a>
        <a href="/consultar-producto">
            <div class="container-img-adm">
                <img src="{{ asset('img/higiene.png') }}" alt="Consultar producto">
            </div>
            Consultar producto
        </a>
        <a href="/actualizar-producto">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Actualizar producto">
            </div>
            Actualizar producto
        </a>
    </div>

    <h2>Control de clientes</h2>
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

    <h2>Control de personal</h2>
    <div class="categorias">
        <a href="/cambiar-rol-personal">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Cambiar rol personal">
            </div>
            Cambiar rol personal
        </a>
        <a href="/generar-reporte">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Generar reporte">
            </div>
            Generar reporte
        </a>
        <a href="/movimientos-inventario">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Generar reporte">
            </div>
            Movimientos inventario
        </a>
    </div>
</div>
@endsection
