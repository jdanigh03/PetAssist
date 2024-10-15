@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="home-cliente">
        <h1>Bienvenido a PetAssist Proveedor</h1>
      
        <h2>Control de productos</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Aumentar producto
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Quitar producto
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Consultar productos
            </a>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection
