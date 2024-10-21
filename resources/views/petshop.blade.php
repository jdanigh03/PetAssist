@extends('layouts.app')

@section('title', 'home')

@section('content')
    <style>
        /* Importa la tipografía Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5e7;;
            padding-bottom: 100px;
            padding-top: 80px;
            overflow-y: auto;
            min-height: 100vh;
            
        }

        .home-cliente {
            align-items: center;
            padding: 20px;
            padding-bottom: 120px;
            min-height: calc(100vh - 160px);
            padding-right: 100px;
            padding-left: 100px;
        }

        h1,
        h2,
        h3 {
            color: #000000;
        }

        .buscador {
            display: flex;
            width: 100%;
            max-width: 400px;
            background-color: #F5F5DC;
            border: 2px solid black;
            border-radius: 10px;
            padding: 8px;
            margin: 20px auto;
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
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }

        .carrusel img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .categorias {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .categorias a {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s ease;
            text-decoration: none;
            color: black;
            font-weight: bold;
            text-align: center;
        }

        .categorias a:hover {
            background-color: #f9f9f9;
            transform: translateY(-5px);
        }

        .container-img {
            font-size: 16px;

            color: #222;
            padding: 0.5rem 0.7rem;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;

            transition: background-color 0.3s ease;
        }

        .sugerencias {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            gap: 20px;
            margin: 20px 0;
        }

        .sugerencia {
            display: flex;
            flex-direction: row;
            background-color: #F5F5DC;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            width: 30%;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sugerencia img {
            width: 100%;
            max-width: 150px;
            height: auto;
            object-fit: contain;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sugerencia-texto {
            flex: 1;
            display: flex;
            flex-direction: column;
            font-size: 14px;
            margin-left: 20px;
        }


        @media (max-width: 768px) {
            .home-cliente {
                padding-top: 0px;
            }

            .sugerencia {
                width: 100%;
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
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                Medicamentos
            </a>
        </div>

        <h2>Sugerencias</h2>
        <div class="sugerencias">
            @foreach ($productos as $producto)
                <div class="sugerencia">
                    <img src="{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}">
                    <div class="sugerencia-texto">
                        <h3>{{ $producto->Nombre }}</h3>
                        <p>Precio: ${{ number_format($producto->Precio, 2) }}</p>
                        <a href="/login">Ver producto</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
