@extends('layouts.app')

@section('title', 'Generar reporte')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        /* Contenedor principal para dar espacio entre navbar y contenido */
        .content-wrapper {
            margin-top: 50px; /* Espacio entre el navbar y el contenido */
            margin-bottom: 60px; /* Espacio entre el contenido y el footer */
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .table-container {
            margin: 0 auto;
            max-width: 90%;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #2f4f4f;
            color: white;
            font-weight: bold;
        }

        .table tr:hover {
            background-color: #f5f5f5;
        }

        .table td {
            vertical-align: middle;
        }

        .table input[type="checkbox"] {
            margin: 0;
        }

        /* Estilo del formulario */
        .form-container {
            text-align: center;
            margin-top: 30px;
        }

        .form-container button {
            padding: 12px 20px;
            background-color:#2f4f4f;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .form-container button:focus {
            outline: none;
        }

        .form-container button:active {
            background-color: #388e3c;
        }

        /* Asegurarse que la tabla no se desborde */
        .table-container {
            margin-top: 20px;
            padding-bottom: 20px;
        }
    </style>

    <div class="content-wrapper">
        <h1>Selecciona las Citas para el Reporte</h1>

        <form method="POST" action="{{ route('admin.generarReportes') }}">
            @csrf
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"> Seleccionar Todo</th>
                            <th>Nombre del Usuario</th>
                            <th>Mascota</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Veterinario</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr>
                                <td><input type="checkbox" name="citas[]" value="{{ $cita->id }}"></td>
                                <td>{{ $cita->user->name }}</td>
                                <td>{{ $cita->mascota->nombre }}</td>
                                <td>{{ \Carbon\Carbon::parse($cita->Fecha_Hora)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($cita->Fecha_Hora)->format('H:i') }}</td>
                                <td>{{ $cita->veterinario->name }}</td>
                                <td>{{ $cita->motivo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-container">
                <button type="submit">Generar Reporte</button>
            </div>
        </form>
    </div>

    <script>
        // Seleccionar todo o desmarcar todo
        document.getElementById('select-all').addEventListener('click', function(e) {
            var checkboxes = document.querySelectorAll('input[name="citas[]"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = e.target.checked;
            }
        });
    </script>
@endsection
