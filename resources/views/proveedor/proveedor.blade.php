@extends('layouts.app')

@section('title', 'Ofertar Productos')

@section('content')

<link rel="stylesheet" href="{{ asset('css/proveedor.css') }}">

<div class="container-ofertar-productos">
    <h1>Ofertar Productos</h1>

    <!-- Mostrar mensaje de éxito si se oferta el producto correctamente -->
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

    <form action="{{ route('proveedor.ofertar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nombre del producto -->
        <div class="form-group">
            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej: Juguete para perro" required>
        </div>

        <!-- Descripción del producto -->
        <div class="form-group">
            <label for="descripcion">Descripción del producto:</label>
            <textarea id="descripcion" name="descripcion" rows="4" placeholder="Detalles sobre el producto..."></textarea>
        </div>

        <!-- Precio por unidad -->
        <div class="form-group">
            <label for="precio">Precio por unidad (Bs):</label>
            <input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 25.00" required>
        </div>

        <!-- Cantidad disponible -->
        <div class="form-group">
            <label for="cantidad">Cantidad disponible:</label>
            <input type="number" id="cantidad" name="cantidad" placeholder="Ej: 100" required>
        </div>

        <!-- Tiempo de entrega estimado -->
        <div class="form-group">
            <label for="tiempo_entrega">Tiempo de entrega estimado (días):</label>
            <input type="number" id="tiempo_entrega" name="tiempo_entrega" placeholder="Ej: 7" required>
        </div>

        <!-- Imagen del producto -->
        <div class="form-group">
            <label for="imagen">Imagen del producto:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
        </div>

        <!-- Categoría -->
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="Juguetes">Juguetes</option>
                <option value="Comida">Comida</option>
                <option value="Accesorios">Accesorios</option>
                <option value="Medicamentos">Medicamentos</option>
                <option value="Higiene">Higiene</option>
            </select>
        </div>

        <!-- Botón para enviar oferta -->
        <button type="submit" class="btn-ofertar">Ofertar Producto</button>
    </form>
</div>

@endsection
