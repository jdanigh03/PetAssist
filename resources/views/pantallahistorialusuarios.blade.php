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
        padding-top: 120px; /* Ajustar espacio entre navbar y contenido */
    }

    .container2 {
        width: 85%; /* Ajustar ancho de la tabla */
        max-width: 1200px;
        margin: 0 auto; /* Centrar tabla */
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h1 {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Tabla del historial */
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
        font-size: 1rem;
    }

    .historial-citas th {
        background-color: #3498db; /* Azul limpio */
        color: #ffffff;
        text-transform: uppercase;
    }

    .historial-citas tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .historial-citas tr:hover {
        background-color: #f1f1f1;
    }

    /* Estilo responsivo */
    @media (max-width: 768px) {
        .container2 {
            width: 95%; /* Ajustar ancho en pantallas pequeñas */
            padding: 20px;
        }

        .historial-citas th,
        .historial-citas td {
            font-size: 0.85rem; /* Reducir fuente en pantallas pequeñas */
            padding: 10px;
        }

        h1 {
            font-size: 1.5rem;
        }
    }
    </style>
</head>

<header>

</header>

<div class="container2">
    <h1>Historial de Citas</h1>
    <table class="historial-citas">
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
            <!-- Aquí se mostrarán las citas -->
            <?php
            // Datos de ejemplo del historial de citas
            $citas = [
                ["nombre" => "Carlos Pérez", "mascota" => "Firulais", "fecha" => "20/10/2024", "hora" => "10:30 AM", "veterinario" => "Dr. Juan Pérez", "motivo" => "cualquiera"],
                ["nombre" => "María González", "mascota" => "Pelusa", "fecha" => "22/10/2024", "hora" => "03:00 PM", "veterinario" => "Dra. María López", "motivo" => "cualquiera"],
                ["nombre" => "Roberto Díaz", "mascota" => "Toby", "fecha" => "25/10/2024", "hora" => "09:00 AM", "veterinario" => "Dr. Carlos Gómez", "motivo" => "cualquiera"],
                ["nombre" => "Ana Fernández", "mascota" => "Nina", "fecha" => "27/10/2024", "hora" => "01:00 PM", "veterinario" => "Dra. Elena Ruiz", "motivo" => "cualquiera"]
            ];

            // Iteramos sobre las citas para mostrarlas en la tabla
            foreach ($citas as $cita) {
                echo "<tr>
                        <td>{$cita['nombre']}</td>
                        <td>{$cita['mascota']}</td>
                        <td>{$cita['fecha']}</td>
                        <td>{$cita['hora']}</td>
                        <td>{$cita['veterinario']}</td>
                        <td>{$cita['motivo']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>