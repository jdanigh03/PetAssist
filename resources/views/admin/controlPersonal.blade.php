@extends('layouts.app')

@section('title', 'Control de Personal')
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
        <a href="/movimientos">
            <div class="container-img-adm">
                <img src="{{ asset('img/medicamentos.png') }}" alt="Movimientos inventario">
            </div>
            Movimientos inventario
        </a>
    </div>
</div>
@endsection
