@extends('layouts.app')

@section('title', 'Nueva Mascota')

@section('content')
    <style>
        .nueva-mascota-layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            max-height: 100vh;
            padding-bottom: 100px;
        }

        .container-nueva-mascota {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5dc;
            padding: 2rem;
            border-radius: 8px;
            min-width: 350px;
            width: 700px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .grupo-form-mascota {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .titulo-nueva-mascota {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            text-align: left;
        }

        .formulario-mascota {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            align-items: start;
        }

        .checkbox-container {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-container input[type="checkbox"] {
            flex-shrink: unset;
            margin: 0;
        }

        .checkbox-container label {
            white-space: nowrap;
        }


        .cargar-foto-mascota {
            grid-column: span 2;
        }

        .formulario-mascota label {
            color: #333;
            margin-bottom: 0.5rem;
            text-align: left;
            display: block;
        }

        .formulario-mascota input,
        .formulario-mascota select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #2f4f4f;
            border-radius: 5px;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        .boton-guardar-mascota {
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            align-self: flex-end;
        }

        .boton-guardar-mascota:hover {
            background-color: #1f3f3f;
        }

        .icono-especie {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .opciones-especie {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }

        #imagen-preview img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <div class="nueva-mascota-layout">
        <div class="container-nueva-mascota">
            <h2 class="titulo-nueva-mascota">Datos generales</h2>

            <form action="{{ route('mascotas.guardar') }}" method="POST" class="formulario-mascota"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                <div class="grupo-form-mascota">
                    <label for="nombre">Nombre de tu peludo*</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej: Firulais" required>
                </div>
                <div class="grupo-form-mascota"><label for="especie">Especie*</label>
                    <select id="especie" name="especie" required>
                        <option value="">Selecciona una especie</option>
                        @foreach ($especies as $especie)
                            <option value="{{ $especie->id }}" data-imagen="{{ $especie->imagen }}">{{ $especie->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="grupo-form-mascota">
                    <label for="raza">Raza*</label>
                    <select id="raza" name="raza" required>
                        <option value="">Escoge una raza</option>
                    </select>
                </div>

                <script>
                    const especieRadios = document.querySelectorAll('input[name="especie"]');
                    const razaSelect = document.getElementById('raza');

                    especieRadios.forEach(radio => {
                        radio.addEventListener('change', () => {
                            const especieId = radio.value;
                            actualizarRazas(especieId);
                        });
                    });

                    function actualizarRazas(especieId) {

                        const razas = {!! json_encode($razasPorEspecie) !!}[especieId] || [];

                        razaSelect.innerHTML = '';
                        razaSelect.innerHTML = '<option value="">Escoge una raza</option>';

                        razas.forEach(raza => {
                            const option = document.createElement('option');
                            option.value = raza.id;
                            option.text = raza.nombre;
                            razaSelect.appendChild(option);
                        });
                    }
                    actualizarRazas(1);
                </script>
                <div class="grupo-form-mascota">
                    <label for="nacimiento">Nacimiento*</label>
                    <div class="checkbox-container">
                        <input type="checkbox" id="no-especificar-fecha" name="no_especificar_fecha">
                        <label for="no-especificar-fecha">No especificar fecha de nacimiento</label>
                    </div>
                    <input type="date" id="nacimiento" name="nacimiento" max="{{ date('Y-m-d') }}" required>
                    @error('nacimiento')
                        <div class="error-message">{{ $message }}</div>
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="cargar-foto-mascota">
                    <label for="foto">Foto de tu peludo (opcional):</label>

                    <input type="file" id="foto" name="foto" accept="image/*">
                    <div id="imagen-preview"></div>
                    <input type="hidden" id="imagen-url" name="imagen_url">
                </div>
                <button type="submit" class="boton-guardar-mascota">Agregar mascota</button>
            </form>

            <script>
                const noEspecificarFechaCheckbox = document.getElementById('no-especificar-fecha');
                const nacimientoInput = document.getElementById('nacimiento');

                noEspecificarFechaCheckbox.addEventListener('change', () => {
                    nacimientoInput.required = !noEspecificarFechaCheckbox
                        .checked;
                    nacimientoInput.disabled = noEspecificarFechaCheckbox
                        .checked;
                });

                const especieSelect = document.getElementById('especie');
                const imagenInput = document.getElementById('foto'); // Asegúrate de tener esta línea
                const imagenUrlInput = document.getElementById('imagen-url');
                const imagenPreview = document.getElementById('imagen-preview');

                especieSelect.addEventListener('change', () => {
                    const selectedOption = especieSelect.options[especieSelect.selectedIndex];
                    const imagenPredeterminada = selectedOption.dataset.imagen;


                    if (imagenPredeterminada && !imagenInput.files[0]) {
                        imagenPreview.innerHTML = `<img src="${imagenPredeterminada}" alt="Imagen predeterminada">`;
                        imagenUrlInput.value = imagenPredeterminada;
                    } else {
                        imagenPreview.innerHTML = '';
                        imagenUrlInput.value = '';
                    }

                    const especieId = especieSelect.value;
                    actualizarRazas(especieId);
                });

                imagenInput.addEventListener('change', () => {
                    const file = imagenInput.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            imagenPreview.innerHTML =
                                `<img src="${e.target.result}" alt="Vista previa">`;
                        }
                        reader.readAsDataURL(file);

                        const formData = new FormData();
                        formData.append('key', '81fd551e66f3e290dce7e02e4f730eac');
                        formData.append('image', file);

                        imagenPreview.innerHTML = '<img src="/img/loading.gif" alt="Cargando...">';

                        fetch('https://api.imgbb.com/1/upload', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    imagenUrlInput.value = data.data.url;
                                    imagenPreview.innerHTML =
                                        `<img src="${data.data.url}" alt="Vista previa">`;

                                } else {
                                    console.error('Error al subir la imagen:', data.error);
                                    imagenPreview.innerHTML = '';
                                    alert("Error al subir la imagen");
                                }
                            })
                            .catch(error => {
                                console.error('Error en la solicitud:', error);
                                imagenPreview.innerHTML = '';
                                alert("Error al subir la imagen");
                            });

                    } else {

                        const selectedOption = especieSelect.options[especieSelect.selectedIndex];
                        const imagenPredeterminada = selectedOption.dataset.imagen;

                        if (imagenPredeterminada) {
                            imagenPreview.innerHTML = `<img src="${imagenPredeterminada}" alt="Imagen predeterminada">`;
                            imagenUrlInput.value = imagenPredeterminada;
                        } else {
                            imagenPreview.innerHTML = ''; // O un mensaje si no hay imagen predeterminada
                            imagenUrlInput.value = '';
                        }
                    }
                });
            </script>
        </div>
    </div>
@endsection
