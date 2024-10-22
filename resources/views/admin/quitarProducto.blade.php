@extends('layouts.app')

@section('title', 'Quitar Producto')

@section('content')

<link rel="stylesheet" href="{{ asset('css/quitarProducto.css') }}">

<div class="container-quitar">
    <h1>Quitar Producto</h1>

    <!-- Mostrar mensaje de éxito o error si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Formulario para seleccionar y quitar el producto -->
    <form action="{{ route('productos.eliminar') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="form-group">
            <label for="producto_id">Selecciona el producto que deseas quitar:</label>
            <select id="producto_id" name="producto_id" required>
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ID_Producto }}">{{ $producto->Nombre }} - {{ $producto->Categoria }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón para quitar el producto -->
        <button type="submit" class="btn-quitar">Quitar Producto</button>
    </form>
</div>

@endsection
