@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Movimientos de Inventario</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table-custom table-striped table-bordered">
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @foreach ($producto->movimientos as $movimiento)
                        <tr>
                            <td>{{ $movimiento->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $movimiento->cantidad }}</td>
                            <td>{{ number_format($movimiento->precio, 2, ',', '.') }} Bs</td>
                            <td>{{ $movimiento->accion }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Estilos internos -->
    <style>
        body {
    background-color: #f5f5e7;
    color: #333;
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px;
    margin-top: 100px;
    margin-bottom: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    text-align: left;
}

h1 {
    font-size: 2rem;
    color: #374e4d;
    margin-bottom: 30px;
    font-weight: bold;
    text-align: center;
}

.table-responsive {
    width: 100%;
    overflow-x: auto;
    margin-top: 20px;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
}

.table-custom th, .table-custom td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table-custom th {
    background-color: #f2f2f2;
    color: #374e4d;
    font-weight: bold;
}

.table-custom td {
    color: #333;
}

.table-custom td, .table-custom th {
    font-size: 1rem;
}

.table-custom td {
    background-color: #fff;
}

.table-custom tr:hover {
    background-color: #f9f9f9;
}

.table-custom .accion {
    font-weight: bold;
}

.alert {
    margin-bottom: 20px;
}

.form-busqueda {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
    gap: 5px;
}

.form-busqueda input[type="text"] {
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    height: 40px;
}

.form-busqueda button {
    padding: 10px 20px;
    background-color: #2f4f4f;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    height: 40px;
}


    </style>
@endsection
