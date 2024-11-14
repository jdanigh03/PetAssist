@extends('layouts.app')

@section('title', 'Ingresar Consulta')

@section('content')
    <style>
        .container {
            max-width: 600px;
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
        textarea {
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
    </style>


    <div class="container">
        <h1>Ingresar Consulta</h1>

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


                <div class="form-group">
                    <label for="nombre_mascota">Nombre de la Mascota:</label>
                    <input type="text" id="nombre_mascota" name="nombre_mascota" readonly>
                </div>



                <div class="form-group">
                    <label for="tratamiento">Tratamiento:</label>
                    <textarea name="tratamiento" id="tratamiento" cols="30" rows="5"></textarea>
                    @error('tratamiento')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="medicamentos">Medicamentos:</label>
                    <textarea name="medicamentos" id="medicamentos" cols="30" rows="5"></textarea>
                    @error('medicamentos')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" cols="30" rows="5"></textarea>
                    @error('observaciones')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pruebas_realizadas">Pruebas Realizadas:</label>
                    <textarea name="pruebas_realizadas" id="pruebas_realizadas" cols="30" rows="5"></textarea>
                    @error('pruebas_realizadas')
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
    </script>
@endsection
