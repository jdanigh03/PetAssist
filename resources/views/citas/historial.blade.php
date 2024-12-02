@extends('layouts.app')

@section('title', 'Historial de Citas')

@section('content')
    <style>
        .historial-citas-layout {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border: 1px solid #ddd;
            text-align: center;
            margin-top: 100px;
            margin-bottom: 50px;
        }

        h1 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .historial-citas {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .historial-citas th,
        .historial-citas td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 0.95rem;
        }

        .historial-citas th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        .historial-citas tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .historial-citas tr:hover {
            background-color: #f1f1f1;
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

        .form-busqueda button:hover {
            background-color: #556b2f;
        }

        .form-busqueda button span {
            font-size: 1.2rem;
        }

        /* Botones */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-modificar {
            background-color: #5cb85c;
            color: white;
        }

        .btn-modificar:hover {
            background-color: #4cae4c;
            transform: scale(1.05);
        }

        .btn-eliminar {
            background-color: #d9534f;
            color: white;
        }

        .btn-eliminar:hover {
            background-color: #c9302c;
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {

            .historial-citas th,
            .historial-citas td {
                font-size: 0.85rem;
                padding: 10px;
            }

            .container2 {
                padding: 20px;
            }
        }

        .tabla-citas {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-citas th,
        .tabla-citas td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;

        }

        .tabla-citas th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .tabla-citas td {
            background-color: #fff;
            color: #333;
        }

        .tabla-citas tr:hover {
            background-color: #f9f9f9;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .pagination nav {
            display: flex;
            flex-direction: column;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination svg {
            width: 20px;
            height: 20px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #2f4f4f;
            text-decoration: none;
        }

        .pagination .active span {
            background-color: #2f4f4f;
            color: white;
        }

        .pagination .disabled span {
            color: #aaa;
            border-color: #eee;
            cursor: default;
        }
    </style>
    <div class="historial-citas-layout">

        <h1>Historial de Citas</h1>
        <form method="GET" action="{{ route('citas.historial') }}" class="form-busqueda">
            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}">
            <button type="submit">
                <span>🔍</span> </button>

            <div class="cantidad-filas">
                <label for="per_page">Cantidad de filas:</label>
                <select name="per_page" id="per_page" onchange="this.form.submit()">
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                </select>
            </div>

        </form>
        @if ($citas->isEmpty())
            <p>No hay citas anteriores a la fecha actual.</p>
        @else
            <table class="tabla-citas">
                <thead>
                    <tr>
                        <th>Mascota</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Motivo</th>
                        <th>Veterinario</th>
                        <th>Tratamiento</th>
                        <th>Medicamentos</th>
                        <th>Observaciones</th>
                        <th>Pruebas Realizadas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->mascota->nombre }}</td>
                            <td>{{ $cita->mascota->raza->especie->nombre }}</td>
                            <td>{{ $cita->mascota->raza->nombre }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->motivo }}</td>
                            <td>{{ $cita->veterinario->name ?? 'No asignado' }}</td>
                            <td>{{ $cita->detalle->tratamiento ?? 'No registrado' }}</td>
                            <td>{{ $cita->detalle->medicamentos ?? 'No registrado' }}</td>
                            <td>{{ $cita->detalle->observaciones ?? 'No registrado' }}</td>
                            <td>{{ $cita->detalle->pruebas_realizadas ?? 'No registrado' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="pagination no-tailwind">
            {{ $citas->links() }}
        </div>
    </div>

@endsection
