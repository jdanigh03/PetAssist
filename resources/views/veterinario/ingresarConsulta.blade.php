@extends('layouts.app')

@section('title', 'Ingresar Consulta')

@section('content')
    <style>
        .container {
            max-width: 900px;
            margin: 3rem auto;
            background-color: #f5f5dc;
            padding: 2rem;
            margin-top: 100px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #2f4f4f;
        }

        h1 {
            color: #2f4f4f;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2f4f4f;
        }

        select,
        textarea,
        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        button {
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1f3f3f;
        }

        .error-message {
            color: red;
            margin-top: 0.25rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            text-align: center;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .form-group {
            flex: 1;
        }

        .checkbox-group {
            display: flex;
            gap: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }

        .dynamic-input {
            display: none;
        }
    </style>

    <div class="container">
        <h1>Ingresar Consulta Veterinaria</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($mensaje))
            <div class="alert alert-info">{{ $mensaje }}</div>
        @elseif(isset($citas) && !$citas->isEmpty())
            <form action="{{ route('consultas.guardar') }}" method="POST">
                @csrf

                <!-- Selección de Cita -->
                <div class="form-group">
                    <label for="cita_id">Selecciona una cita:</label>
                    <select name="cita_id" id="cita_id" required onchange="cargarDatosMascota()">
                        <option value="">Selecciona una cita</option>
                        @foreach ($citas as $cita)
                            <option value="{{ $cita->id }}" data-mascota="{{ $cita->mascota->nombre }}">
                                Cita para {{ $cita->motivo }} - {{ $cita->mascota->nombre }} ({{ $cita->Fecha_Hora }})
                            </option>
                        @endforeach
                    </select>
                    @error('cita_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nombre de la Mascota -->
                <div class="form-group">
                    <label for="nombre_mascota">Nombre de la Mascota:</label>
                    <input type="text" id="nombre_mascota" name="nombre_mascota" readonly>
                </div>

                <!-- Anamnesis y Diagnóstico -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="anamnesis">Anamnesis:</label>
                        <textarea name="anamnesis" id="anamnesis" cols="30" rows="5"></textarea>
                        @error('anamnesis')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="diagnostico">Diagnóstico:</label>
                        <textarea name="diagnostico" id="diagnostico" cols="30" rows="5"></textarea>
                        @error('diagnostico')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Receta Médica -->
                <div class="form-group">
                    <label for="receta_medica">Receta Médica:</label>
                    <textarea name="receta_medica" id="receta_medica" cols="30" rows="5"></textarea>
                    @error('receta_medica')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pruebas Realizadas -->
                <div class="form-row">
                    <!-- Gabinete -->
                    <div class="form-group">
                        <label>Pruebas de Gabinete:</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="gabinete[]" value="Tomografía"> Tomografía</label>
                            <label><input type="checkbox" name="gabinete[]" value="Ecografía"> Ecografía</label>
                            <label><input type="checkbox" name="gabinete[]" value="Resonancia"> Resonancia</label>
                            <label><input type="checkbox" id="gabinete_otro" value="Otro"> Otro</label>
                        </div>
                        <div id="gabinete_otro_input" class="dynamic-input">
                            <label for="gabinete_otro_estudio">Especificar otro estudio:</label>
                            <input type="text" name="gabinete_otro_estudio" id="gabinete_otro_estudio">
                        </div>
                    </div>

                    <!-- Laboratorio -->
                    <div class="form-group">
                        <label>Pruebas de Laboratorio:</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="laboratorio[]" value="Sangre"> Sangre</label>
                            <label><input type="checkbox" name="laboratorio[]" value="Orina"> Orina</label>
                            <label><input type="checkbox" name="laboratorio[]" value="Heces"> Heces</label>
                            <label><input type="checkbox" id="laboratorio_otro" value="Otro"> Otro</label>
                        </div>
                        <div id="laboratorio_otro_input" class="dynamic-input">
                            <label for="laboratorio_otro_estudio">Especificar otro estudio:</label>
                            <input type="text" name="laboratorio_otro_estudio" id="laboratorio_otro_estudio">
                        </div>
                    </div>
                </div>

                <!-- Instrucciones Adicionales -->
                <div class="form-group">
                    <label for="instrucciones">Instrucciones adicionales:</label>
                    <textarea name="instrucciones" id="instrucciones" cols="30" rows="5"></textarea>
                    @error('instrucciones')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">Añadir Consulta</button>
            </form>
        @endif
    </div>

    <script>
        function cargarDatosMascota() {
            const selectCita = document.getElementById('cita_id');
            const nombreMascotaInput = document.getElementById('nombre_mascota');
            const selectedOption = selectCita.options[selectCita.selectedIndex];
            const nombreMascota = selectedOption.getAttribute('data-mascota');

            nombreMascotaInput.value = nombreMascota;
        }

        // Mostrar/ocultar campos para estudios "Otro"
        document.getElementById('gabinete_otro').addEventListener('change', function() {
            document.getElementById('gabinete_otro_input').style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('laboratorio_otro').addEventListener('change', function() {
            document.getElementById('laboratorio_otro_input').style.display = this.checked ? 'block' : 'none';
        });
    </script>
@endsection
