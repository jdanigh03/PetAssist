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
            scale: 2;
            padding-top: 300px;
            width: 40%;
          }
            .sugerencia img {
                height: 85px;
            }

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
                <div class="img-sug">
                    <img src="{{ asset('img/pedigree.png') }}" alt="Sugerencia 1">
                </div>
                <div class="sugerencia-texto">
                    <h3>Nombre</h3>
                    <p>Precio</p>
                </div>
            </div>
            <div class="sugerencia">
                <div class="img-sug">
                    <img src="{{ asset('img/pedigree.png') }}" alt="Sugerencia 2">
                </div>
                <div class="sugerencia-texto">
                    <h3>Nombre</h3>
                    <p>Precio</p>
                </div>
            </div>
        </div>
    </div>

    <x-navegacion />

@endsection
