<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Citas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            width: 100px;
        }
        .title {
            text-align: center;
            font-size: 24px;
            margin: 20px 0;
        }
        .citas-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .citas-table th, .citas-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .citas-table th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
        button {
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5%;
        }
        .btn-container {
            display: block;
            border-radius: 5%;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('img/logoGoCan.png') }}" alt="Imagen Izquierda">
        <div class="title">
            <h1>{{ isset($citas) && count($citas) > 1 ? 'Citas Seleccionadas' : 'Cita Seleccionada' }}</h1>
        </div>
        <img src="{{ asset('img/Logo PetAssist 2.webp') }}" alt="Imagen Derecha">
    </div>

    @if(isset($citas) && count($citas) > 0)
        <table class="citas-table" id="tablaCitas">
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
    @else
        <p>No se encontraron citas seleccionadas.</p>
    @endif

    <div class="footer">
        <p>Fecha y hora de solicitud: {{ $fechaSolicitud }}</p>
        <p>Persona que solicitó el reporte: {{ $solicitante }}</p>
        <!-- Botones para descargar los reportes -->
        <div class="btn-container" id="botonesGeneracion">
            <button id="btnGenerarPDF">Generar PDF</button>
            <button id="btnGenerarExcel">Generar Excel</button>
            <button id="btnGenerarPDFExcel">Generar PDF y Excel</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
        // Función que oculta los botones de generación
        function ocultarBotones() {
            document.getElementById('botonesGeneracion').style.display = 'none';
        }

        // Función que genera el reporte y redirige a la página anterior
        function generarYVolver(elemento, opciones, tipo) {
            ocultarBotones(); // Ocultar los botones al generar el reporte

            // Generar PDF o Excel según el tipo
            if (tipo === 'pdf') {
                html2pdf().from(elemento).set(opciones).save();
            } else if (tipo === 'excel') {
                const wb = XLSX.utils.book_new();
                const ws_data = [
                    ["Reporte de Citas", "", "", ""], // Título del reporte
                    ["Fecha y hora de solicitud:", "{{ $fechaSolicitud }}"],
                    ["Persona que solicitó el reporte:", "{{ $solicitante }}"],
                    [],
                    ["Nombre del Usuario", "Mascota", "Fecha", "Hora", "Veterinario", "Motivo"] // Encabezado de la tabla
                ];

                // Añadir los datos de las citas
                @foreach ($citas as $cita)
                    ws_data.push([ 
                        "{{ $cita->user->name }}", 
                        "{{ $cita->mascota->nombre }}", 
                        "{{ \Carbon\Carbon::parse($cita->Fecha_Hora)->format('d/m/Y') }}", 
                        "{{ \Carbon\Carbon::parse($cita->Fecha_Hora)->format('H:i') }}", 
                        "{{ $cita->veterinario->name }}", 
                        "{{ $cita->motivo }}" 
                    ]);
                @endforeach

                // Crear una hoja con todos los datos
                const ws = XLSX.utils.aoa_to_sheet(ws_data);

                // Configurar el libro y la hoja
                XLSX.utils.book_append_sheet(wb, ws, "Citas");

                // Escribir el archivo Excel
                XLSX.writeFile(wb, 'reporte_completo_citas.xlsx');
            }

            // Después de 2 segundos, volver a la página anterior
            setTimeout(function() {
                window.history.back();
            }, 2000); // 2 segundos
        }

        // Generar solo PDF
        document.getElementById('btnGenerarPDF').addEventListener('click', function() {
            const element = document.body; // Captura todo el cuerpo de la página
            const pdfOptions = {
                filename: 'reporte_completo_citas.pdf',
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                margin: 10
            };
            generarYVolver(element, pdfOptions, 'pdf');
        });

        // Generar solo Excel
        document.getElementById('btnGenerarExcel').addEventListener('click', function() {
            generarYVolver(document.body, null, 'excel');
        });

        // Generar tanto PDF como Excel
        document.getElementById('btnGenerarPDFExcel').addEventListener('click', function() {
            const element = document.body; // Captura todo el cuerpo de la página
            const pdfOptions = {
                filename: 'reporte_completo_citas.pdf',
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
                margin: 10
            };
            generarYVolver(element, pdfOptions, 'pdf');
            generarYVolver(document.body, null, 'excel');
        });
    </script>

</body>
</html>
