@extends('layouts.app')

@section('title', 'home')

@section('content')
    <style>
        body {
            background-image: none;
            background-color: #78D4CC;
            min-height: 100vh;
            overflow: auto;
        }

        .home-cliente {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            /* Nueva propiedad para dejar espacio al footer */
            padding-bottom: 80px;
            /* Ajusta el valor según la altura de tu footer */
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
            justify-content: space-between;
            width: 100%;
            max-width: 500px;
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


        .container-img {
            font-size: 20px;
            background-color: #d3ff54;
            color: #222;
            padding: 0.7rem 0.9rem;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            border: 3px solid black;
            transition: background-color 0.3s ease;

        }

        .categorias img {
            width: 30px;
            height: 30px;
            border-radius: 10px;

        }

        .sugerencias {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .sugerencia {
            display: flex;
            flex-direction: row;
            background-color: #bada55;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            width: 100px;
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
