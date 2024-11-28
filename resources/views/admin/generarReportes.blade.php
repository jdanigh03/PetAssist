<!-- resources/views/admin/generarReportes.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Citas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }
        h1 {
            text-align: center;
            margin: 30px 0;
            color: #333;
            font-weight: 700;
        }
        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }
        .table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tr:hover {
            background-color: #f1f1f1;
        }
        .table td {
            font-size: 13px;
            color: #555;
        }
        .btn-pdf {
            display: inline-block;
            margin: 20px auto;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-pdf:hover {
            background-color: #45a049;
        }
        .table-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reporte de Citas</h1>

        <a href="{{ url('/generar-pdf') }}" class="btn-pdf">Generar PDF</a>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
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
    </div>

</body>
</html>
