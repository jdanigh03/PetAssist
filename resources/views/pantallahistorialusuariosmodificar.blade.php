@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            height: 100%;
            padding-top: 200px;
        }

        .container2 {
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

        /* Título */
        h1 {
            font-size: 2rem;
            color: #2c3e50;
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

        .form-busqueda button:hover {
            background-color: #556b2f;
        }

        .form-busqueda button span {
            font-size: 1.2rem;
        }

        /* Tabla */
        .historial-citas {
            width: 100%;
            border-collapse: collapse;
        }

        .historial-citas th,
        .historial-citas td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
        }

        .historial-citas th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .historial-citas td {
            background-color: #fff;
            color: #333;
        }



        .historial-citas tr:hover {
            background-color: #f9f9f9;
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
    </head>

    <div class="container2">
        <h1>Control de Citas</h1>
        <form method="GET" action="{{ url()->current() }}" class="form-busqueda">
            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}">
            <button type="submit"> <span>🔍</span> </button>


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
        <table class="historial-citas">
            <thead>
                <tr>
                    <th>Nombre del Usuario</th>
                    <th>Mascota</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Veterinario</th>
                    <th>Motivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($citas as $cita)
                    <tr>
                        <td>{{ $cita->user->name ?? 'Usuario no disponible' }}</td>
                        <td>{{ $cita->mascota->nombre ?? 'Mascota no disponible' }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->veterinario->name ?? 'Veterinario no disponible' }}</td>
                        <td>{{ $cita->motivo }}</td>
                        <td class="action-buttons">
                            <button class="btn-modificar">Modificar</button>
                            <button class="btn-eliminar">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <p>No hay citas para mostrar.</p>
                        <td colspan="7">No hay citas para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination no-tailwind">
            {{ $citas->links() }}
        </div>
    </div>

@endsection
