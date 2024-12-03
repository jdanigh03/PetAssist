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

        /* Tabla */
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
                    </tr>
                @empty
                    <tr>
                        <p>No hay citas para mostrar.</p>
                        <td colspan="7">No hay citas para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
