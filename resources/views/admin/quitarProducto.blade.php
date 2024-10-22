@extends('layouts.app')

@section('title', 'Quitar Producto')

@section('content')

<link rel="stylesheet" href="{{ asset('css/quitarProducto.css') }}">

<div class="container-quitar">
    <h1>Quitar Producto</h1>

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
    <form method="GET" action="{{ route('productos.quitar') }}">
        <div class="form-group">
            <label for="producto_id">Selecciona el producto que deseas quitar:</label>
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
        <div class="product-details">
            <img src="{{ asset($producto->Imagen) }}" alt="Imagen del Producto" class="product-image">
            <div class="details">
                <p><strong>Nombre:</strong> {{ $producto->Nombre }}</p>
                <p><strong>Descripción:</strong> {{ $producto->Descripcion }}</p>
                <p><strong>Precio:</strong> Bs {{ $producto->Precio }}</p>
                <p><strong>Cantidad:</strong> {{ $producto->Cantidad }}</p>
                <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>
            </div>

            <!-- Formulario para eliminar el producto -->
            <form action="{{ route('productos.eliminar') }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="producto_id" value="{{ $producto->ID_Producto }}">
                <button type="submit" class="btn-quitar">Eliminar Producto</button>
            </form>
        </div>
    @endif
</div>

@endsection
