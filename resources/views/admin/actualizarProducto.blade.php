@extends('layouts.app')

@section('title', 'Actualizar Producto')

@section('content')

<link rel="stylesheet" href="{{ asset('css/actualizarProducto.css') }}">

<div class="container-actualizar">
    <h1>Actualizar Producto</h1>

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

    <!-- Formulario para seleccionar el producto -->
    <form method="GET" action="{{ route('productos.actualizar') }}">
        <div class="form-group">
            <label for="producto_id">Selecciona el producto que deseas actualizar:</label>
            <select id="producto_id" name="producto_id" onchange="this.form.submit()">
                <option value="">Selecciona un producto</option>
                @foreach($productos as $item)
                    <option value="{{ $item->ID_Producto }}" {{ isset($producto) && $producto->ID_Producto == $item->ID_Producto ? 'selected' : '' }}>
                        {{ $item->Nombre }} - {{ $item->Categoria }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Mostrar detalles del producto seleccionado si existe -->
    @if($producto)
        <form action="{{ route('productos.actualizar.confirmar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->ID_Producto }}">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->Nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="3">{{ $producto->Descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio (Bs):</label>
                <input type="number" id="precio" name="precio" step="0.01" value="{{ $producto->Precio }}" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="{{ $producto->Cantidad }}" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen (opcional):</label>
                <input type="file" id="imagen" name="imagen" accept="image/*">
                @if($producto->Imagen)
                    <img src="{{ asset($producto->Imagen) }}" alt="Imagen actual" class="producto-image">
                @endif
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" required>
                    <option value="Juguetes" {{ $producto->Categoria == 'Juguetes' ? 'selected' : '' }}>Juguetes</option>
                    <option value="Comida" {{ $producto->Categoria == 'Comida' ? 'selected' : '' }}>Comida</option>
                    <option value="Accesorios" {{ $producto->Categoria == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                    <option value="Medicamentos" {{ $producto->Categoria == 'Medicamentos' ? 'selected' : '' }}>Medicamentos</option>
                </select>
            </div>

            <button type="submit" class="btn-actualizar">Actualizar Producto</button>
        </form>
    @endif
</div>

@endsection
