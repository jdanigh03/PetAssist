@extends('layouts.app')

@section('title', 'home')

@section('content')
    <style>
        body {
            background-image: none;
            background-color: #78D4CC;
        }

        /* Estilos para el contenedor principal */
        .home-cliente {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 400px;
            /* Ajusta el ancho máximo según necesites */
            margin: 0 auto;
            padding: 20px;
        }

        /* Estilos para el buscador */
        .buscador {
            display: flex;
            width: 100%;
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

        /* Estilos para las imágenes del carrusel */
        .carrusel img {
            width: 250px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        /* Estilos para las categorías */
        .categorias {
            display: flex;
            justify-content: space-between;
            width: auto;
            margin-bottom: 20px;
        }

        .categorias a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .categorias img {
            width: 20px;
            height: 20px;
        }

        .container-img {
            font-size: 20px;
            background-color: #d3ff54;
            color: #222;
            padding: 0.75rem 1.5rem;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            border: 3px solid black;
            transition: background-color 0.3s ease;

        }

        .categorias img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        /* Estilos para la sección de sugerencias */
        .sugerencias {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .sugerencia {
            display: flex;
            flex-direction: row;
            background-color: #bada55;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            width: 300px;
            text-align: center;
        }

        .sugerencia img {
            width: 100%;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sugerencia-texto {
            display: flex;
            flex-direction: column;

        }
    </style>

    <div class="home-cliente">
        <h1>Petshop</h1>

        <div class="buscador">
            <input type="text" placeholder="Buscar...">
            <button type="submit">
                <img src="{{ asset('img/buscar.png') }}" alt="Buscar" height="20">
            </button>
        </div>

        <div class="carrusel">
            <img src="{{ asset('img/image 38.png') }}" alt="Imagen 1">
        </div>

        <h2>Categorías</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Alimentos
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Accesorios
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Higiene
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/medicamentos.png') }}"" alt="Medicamentos">
                </div>
                Medicamentos
            </a>
        </div>

        <h2>Sugerencias</h2>
        <div class="sugerencias">
            <div class="sugerencia">
                <img src="{{ asset('img/pedigree.png') }}" alt="Sugerencia 1">
                <div class="sugerencia-texto">
                    <h3>Nombre</h3>
                    <p>Precio</p>
                </div>
            </div>
            <div class="sugerencia">
                <img src="ruta/a/tu/imagen_sugerencia2.jpg" alt="Sugerencia 2">
                <div class="sugerencia-texto">
                    <h3>Nombre</h3>
                    <p>Precio</p>
                </div>
            </div>
        </div>
    </div>

    <x-navegacion />

@endsection
