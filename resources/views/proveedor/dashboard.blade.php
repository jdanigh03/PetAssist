@extends('layouts.app')

@section('title', 'Proveedor Dashboard')
<style>
    .home-proveedor {
        text-align: center;
        padding: 20px;
        margin-top: 90px;
        padding-bottom: 120px;
        min-height: calc(100vh - 160px);
    }
    .categorias a {
        text-decoration: none;
        color: #000;
        display: inline-block;
        margin: 20px;
    }
    .categorias .container-img-adm {
        width: 150px;
        height: 150px;
        margin: auto;
    }
    .categorias .container-img-adm img {
        width: 100%;
        height: auto;
    }
</style>

@section('content')
<link rel="stylesheet" href="{{ asset('css/proveedor.css') }}">

<div class="home-proveedor">
    <h1>Panel de Proveedor</h1>
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
