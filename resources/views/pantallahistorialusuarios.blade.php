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

        .container {
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        /* Responsive */
        @media (max-width: 768px) {
            .historial-citas th, .historial-citas td {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Historial de Citas</h1>
    <table class="historial-citas">
        <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Mascota</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Veterinario</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se mostrarán las citas -->
            <?php
            // Datos de ejemplo del historial de citas
            $citas = [
                ["nombre" => "Carlos Pérez", "mascota" => "Firulais", "fecha" => "20/10/2024", "hora" => "10:30 AM", "veterinario" => "Dr. Juan Pérez"],
                ["nombre" => "María González", "mascota" => "Pelusa", "fecha" => "22/10/2024", "hora" => "03:00 PM", "veterinario" => "Dra. María López"],
                ["nombre" => "Roberto Díaz", "mascota" => "Toby", "fecha" => "25/10/2024", "hora" => "09:00 AM", "veterinario" => "Dr. Carlos Gómez"],
                ["nombre" => "Ana Fernández", "mascota" => "Nina", "fecha" => "27/10/2024", "hora" => "01:00 PM", "veterinario" => "Dra. Elena Ruiz"]
            ];

            // Iteramos sobre las citas para mostrarlas en la tabla
            foreach ($citas as $cita) {
                echo "<tr>
                        <td>{$cita['nombre']}</td>
                        <td>{$cita['mascota']}</td>
                        <td>{$cita['fecha']}</td>
                        <td>{$cita['hora']}</td>
                        <td>{$cita['veterinario']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>