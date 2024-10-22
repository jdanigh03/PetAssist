@extends('layouts.app')

@section('title', 'Aumentar Producto')

@section('content')

<link rel="stylesheet" href="{{ asset('css/aumentarProducto.css') }}">

<div class="container-aumentar">
    <h1>Aumentar Producto</h1>

    <!-- Mostrar mensaje de éxito si el producto se agrega correctamente -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores de validación si los hay -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.agregar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nombre del producto -->
        <div class="form-group">
            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej: Juguete para perro" required>
        </div>

        <!-- Descripción del producto -->
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto..."></textarea>
        </div>

        <!-- Precio del producto -->
        <div class="form-group">
            <label for="precio">Precio (Bs):</label>
            <input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 50.00" required>
        </div>

        <!-- Cantidad del producto -->
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" placeholder="Ej: 10" required>
        </div>

        <!-- Imagen del producto -->
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
        </div>

        <!-- Categoría del producto -->
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="Juguetes">Juguetes</option>
                <option value="Comida">Comida</option>
                <option value="Accesorios">Accesorios</option>
                <option value="Medicamentos">Medicamentos</option>
            </select>
        </div>

        <!-- Botón para agregar producto -->
        <button type="submit" class="btn-agregar">Agregar Producto</button>
    </form>
</div>

@endsection
