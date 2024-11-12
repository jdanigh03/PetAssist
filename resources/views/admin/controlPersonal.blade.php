@extends('layouts.app')

@section('title', 'Control de Personal')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="home-cliente">
    <h1>Control de Personal</h1>
    <div class="categorias">
        <a href="/cambiar-rol">
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
                <img src="{{ asset('img/medicamentos.png') }}" alt="Movimientos inventario">
            </div>
            Movimientos inventario
        </a>
    </div>
</div>
@endsection
