@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <div class="home-cliente">
        <h1>Bienvenido a PetAssist administrador</h1>
      
        <h2>Control de inventario</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Aumentar producto
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Quitar producto
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Consultar producto
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                Actualizar producto
            </a>
        </div>

        <h2>Control de clientes</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Control de citas
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Historial de visitas
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Cuentas pendientes
            </a>
            <a href="#">
                <div class="container-img-adm">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                Control de mascotas
            </a>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection
