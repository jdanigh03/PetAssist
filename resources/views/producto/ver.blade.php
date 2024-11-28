@extends('layouts.app')

@section('title', $producto->Nombre)

@section('content')
    <div class="container">
        <h1>{{ $producto->Nombre }}</h1>
        <div class="producto-detalle">
            <div class="producto-imagen">
                <img src="{{ asset($producto->Imagen) }}" alt="{{ $producto->Nombre }}" style="max-width: 300px; height: auto;">
            </div>
            <div class="producto-info">
                <p><strong>Precio:</strong> Bs {{ number_format($producto->Precio, 2) }}</p>
                <p><strong>Descripción:</strong> {{ $producto->Descripcion }}</p>
                <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
    </div>

    <style>
        .container {
            margin-top: 100px;
            padding: 20px;
            background-color: #F5F5DC;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .producto-detalle {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .producto-imagen {
            max-width: 300px;
        }

        .producto-info {
            flex: 1;
        }

        .btn-primary {
            display: flex;
            background-color: #2F4F4F;
            color: #FFFFFF;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #556B2F;
        }
    </style>
@endsection
