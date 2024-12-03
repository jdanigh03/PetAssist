@extends('layouts.app')

@section('title', 'Control de Mascotas')

@section('content')
    <style>
        .control-mascotas-layout {
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

        /* Tabla */
        .tabla-mascotas {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .tabla-mascotas th,
        .tabla-mascotas td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 0.95rem;
        }

        .tabla-mascotas th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        .tabla-mascotas tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .tabla-mascotas tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <div class="control-mascotas-layout">
        <h1>Control de Mascotas</h1>

        @if ($mascotas->isEmpty())
            <p>No hay mascotas registradas.</p>
        @else
            <table class="tabla-mascotas">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Nacimiento</th>
                        <th>Dueño</th>
                        <th>Foto</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->raza->especie->nombre }}</td>
                            <td>{{ $mascota->raza->nombre }}</td>
                            <td>{{ $mascota->nacimiento_formateado }}</td>
                            <td>{{ $mascota->user->name }}</td>
                            <td>
                                <img src="{{ $mascota->foto }}" alt="Foto de {{ $mascota->nombre }}" width="100"
                                    onerror="this.src='/img/perfilPredeterminado.png'">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
