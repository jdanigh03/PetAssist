@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Aquí puedes añadir más contenido específico para el panel de administración -->

    <!-- Sección Home Cliente -->
    <div class="home-cliente">
    <h1>Bienvenido a 
    PetAssist administrador</h1>

      
        <h2>Control de inventario</h2>
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
                Consultar producto
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                Actualizar producto
            </a>
        </div>
        <h2>Control de clientes</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Control de citas
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Historial de visitas
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Cuentas pendientes
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                control de mascotas
            </a>
        </div>


        
    </div>

    <!-- Footer fijo -->
    <div class="navegacion-footer">
        <a href="#">
            <img src="{{ asset('img/contactos.png') }}" alt="Contactos">
            Contactos
        </a>
        <a href="#">
            <img src="{{ asset('img/agenda.png') }}" alt="Agenda">
            Citas
        </a>
        <a href="#">
            <img src="{{ asset('img/inicio.png') }}" alt="Inicio">
            Inicio
        </a>
        <a href="#">
            <img src="{{ asset('img/mascotas.png') }}" alt="Mascotas">
            Mascotas
        </a>
        <a href="#">
            <img src="{{ asset('img/perfil.png') }}" alt="Perfil">
            Perfil
        </a>
    </div>

    <style>
        body {
            background-image: none;
            background-color: #78D4CC;
            min-height: 100vh;
            overflow: auto;
            padding-bottom: 80px; /* Para evitar que el contenido sea tapado por el footer */
        }

        .home-cliente {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            padding-bottom: 120px;
        }

        .buscador {
            display: flex;
            width: 100%;
            max-width: 400px;
            background-color: #4ed8a0;
            border: 2px solid black;
            border-radius: 10px;
            padding: 8px;
            margin-bottom: 20px;
        }

        .buscador input[type="text"] {
            border: none;
            background: transparent;
            padding: 5px;
            width: 100%;
            font-size: 16px;
        }

        .buscador button {
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .carrusel {
            width: auto;
        }

        .carrusel img {
            margin: 20px;
            width: 100%;
            max-width: 300px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .categorias {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .categorias a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: black;
            font-weight: bold;
            margin: 10px;
        }

        .container-img {
            font-size: 16px;
            background-color: #d3ff54;
            color: #222;
            padding: 0.5rem 0.7rem;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            border: 3px solid black;
            transition: background-color 0.3s ease;
        }

        .categorias img {
            width: auto;
            height: 30px;
            border-radius: 10px;
        }

        .sugerencias {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            max-width: 400px;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        .sugerencia {
            display: flex;
            flex-direction: row;
            background-color: #bada55;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            width: 49%;
            margin-bottom: 10px;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .img-sug {
            display: flex;
            justify-content: center;
        }

        .sugerencia img {
            width: auto;
            height: 80px;
            object-fit: contain;
            border-radius: 10px;
        }

        .sugerencia-texto {
            display: flex;
            flex-direction: column;
            font-size: 14px;
            margin-left: 20px;
        }

        @media (min-width: 320px) {
            .sugerencia img {
                height: 60px;
            }
        }

        @media (min-width: 768px) {
          .home-cliente {
            scale: 1.5;
            padding-top: 200px;
            width: 40%;
          }
            .sugerencia img {
                height: 85px;
            }

        }

        /* Footer */
        .navegacion-footer {
            background-color: #4ed8a0;
            border: 3px solid black;
            border-radius: 20px;
            padding: 1rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 100;
        }

        .navegacion-footer a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .navegacion-footer img,
        .navegacion-footer svg {
            width: 24px;
            height: 24px;
            margin: 0.5rem;
        }
    </style>
@endsection
