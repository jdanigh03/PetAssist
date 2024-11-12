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

        /* Responsive */
        @media (max-width: 768px) {
            .historial-citas th, .historial-citas td {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<header>

</header>

<div class="container2">
    <h1>Control de mascotas</h1>
    <table class="historial-citas">
        <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Mascota</th>
                <th>Raza</th>
                <th>Sexo</th>
                <th>Especie</th>
                <th>Color</th>
                <th>Peso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Datos de ejemplo del historial de citas
            $citas = [
            ["nombre" => "María López", "mascota" => "Luna", "raza" => "labrador", "sexo" => "femenino", "especie" => "perro", "color" => "negro", "peso" => "25kg"],
            ["nombre" => "José García", "mascota" => "Tom", "raza" => "siamés", "sexo" => "masculino", "especie" => "gato", "color" => "blanco", "peso" => "6kg"],
            ["nombre" => "Ana Fernández", "mascota" => "Max", "raza" => "golden retriever", "sexo" => "masculino", "especie" => "perro", "color" => "dorado", "peso" => "30kg"],
            ["nombre" => "Luis Herrera", "mascota" => "Bella", "raza" => "beagle", "sexo" => "femenino", "especie" => "perro", "color" => "tricolor", "peso" => "12kg"],
            ["nombre" => "Carla Jiménez", "mascota" => "Milo", "raza" => "persa", "sexo" => "masculino", "especie" => "gato", "color" => "gris", "peso" => "8kg"]
        ];

            foreach ($citas as $cita) {
                echo "<tr>
                        <td>{$cita['nombre']}</td>
                        <td>{$cita['mascota']}</td>
                        <td>{$cita['raza']}</td>
                        <td>{$cita['sexo']}</td>
                        <td>{$cita['especie']}</td>
                        <td>{$cita['color']}</td>
                        <td>{$cita['peso']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>