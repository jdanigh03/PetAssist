@extends('layouts.app')

@section('title', 'Consultar Productos')

@section('content')

<link rel="stylesheet" href="{{ asset('css/consultarProducto.css') }}">

<div class="container-consultar">
    <h1>Consultar Productos</h1>

    <!-- Campo de búsqueda -->
    <form method="GET" action="{{ route('productos.consultar') }}" class="form-busqueda">
        <input type="text" name="search" placeholder="Buscar producto..." value="{{ request('search') }}">
        <button type="submit">Buscar</button>
    </form>

    <!-- Mostrar productos -->
    <div class="productos-lista">
        @if($productos->isEmpty())
            <p>No hay productos disponibles en el inventario.</p>
        @else
            <table class="productos-tabla">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio (Bs)</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td><img src="{{ asset($producto->Imagen) }}" alt="Imagen del Producto" class="producto-image"></td>
                            <td>{{ $producto->Nombre }}</td>
                            <td>{{ $producto->Categoria }}</td>
                            <td>Bs {{ number_format($producto->Precio, 2) }}</td>
                            <td>{{ $producto->Cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
