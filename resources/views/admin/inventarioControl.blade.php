@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="home-cliente">
    <h1>Control de Inventario</h1>
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
    </div>
</div>
@endsection
