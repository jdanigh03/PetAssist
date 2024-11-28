@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5e7;
            padding-bottom: 100px;
            padding-top: 80px;
            overflow-y: auto;
            min-height: 100vh;
        }

        .home-cliente {
            align-items: center;
            padding: 20px;
            padding-bottom: 120px;
            margin-top: 60px;
            min-height: calc(100vh - 160px);
            padding-right: 100px;
            padding-left: 100px;
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

        .sugerencia a {
            background-color: #2f4f4f;
            color: #FFFFFF;
            padding: 0.7rem 1rem;
            margin-top: 10px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="home-cliente">

        <h1>Resultados de búsqueda para "{{ $search }}"</h1>


        @if ($productos->count() > 0)
            <div class="sugerencias">
                @foreach ($productos as $producto)
                    <div class="sugerencia">
                        <img src="{{ asset($producto->Imagen) }}" alt="{{ $producto->Nombre }}">
                        <div class="sugerencia-texto">
                            <h3>{{ $producto->Nombre }}</h3>
                            <p>Precio: Bs {{ number_format($producto->Precio, 2) }}</p>
                            <a href="{{ route('petshop.mostrarProducto', $producto) }}">Ver producto</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No se encontraron productos que coincidan con tu búsqueda.</p>
        @endif

    </div>

@endsection
