@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container2 {
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 3px solid black;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        /* Estilos del historial */
        .historial-citas {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .historial-citas th, .historial-citas td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .historial-citas th {
            background-color: #4CAF50;
            color: white;
        }

        .historial-citas tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .historial-citas tr:hover {
            background-color: #ddd;
        }

        .action-buttons {
            display: flex;
            justify-content: space-evenly;
        }

        .action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-modificar {
            background-color: #3498db;
            color: white;
        }

        .btn-eliminar {
            background-color: #e74c3c;
            color: white;
        }

        @media (max-width: 768px) {
            .historial-citas th, .historial-citas td {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<div class="container2">
    <h1>Control de Citas</h1>
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
                <tr> <p>No hay citas para mostrar.</p>
                    <td colspan="7">No hay citas para mostrar.</td>
                </tr>
            @endforelse 
        </tbody>
    </table>
</div>

@endsection
