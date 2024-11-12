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
            padding: 20px;
            overflow-y: auto;
            max-height: 100vh;
            padding-bottom: 100px;
        }

        .container-nueva-mascota {
            background-color: #f5f5dc;
            padding: 2rem;
            border-radius: 8px;
            min-width: 350px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #2f4f4f;
            display: flex;
            flex-direction: column;
        }

        .titulo-nueva-mascota {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            text-align: left;
        }

        .formulario-mascota {
            display: unset;
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

                <label for="especie">Especie*</label>
                <div class="opciones-especie">
                    <input type="radio" id="perro" name="especie" value="1">
                    <img src="https://cdn-icons-png.flaticon.com/512/9769/9769450.png" alt="Perro" class="icono-especie">
                    <label for="perro">Perro</label>
                    <input type="radio" id="gato" name="especie" value="2">
                    <img src="https://cdn-icons-png.flaticon.com/512/1864/1864514.png" alt="Gato" class="icono-especie">
                    <label for="gato">Gato</label>
                </div>


                <label for="nombre">Nombre de tu peludo*</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Firulais" required>

                <label for="raza">Raza*</label>
                <select id="raza" name="raza" required>
                    <option value="">Escoge una raza</option>
                </select>


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
                        fetch(`/obtener-razas/${especieId}`)
                            .then(response => response.json())
                            .then(razas => {
                                razaSelect.innerHTML = '<option value="">Escoge una raza</option>'; 
                                razas.forEach(raza => {
                                    const option = document.createElement('option');
                                    option.value = raza.id;
                                    option.text = raza.nombre;
                                    razaSelect.appendChild(option);
                                });
                            });
                    }

            
                    actualizarRazas(1);
                </script>

                <label for="nacimiento">Nacimiento*</label>
                <input type="date" id="nacimiento" name="nacimiento" required>


                <label for="foto">Foto de tu peludo (opcional):</label>

                <input type="file" id="foto" name="foto" accept="image/*">
                <div id="imagen-preview"></div>
                <input type="hidden" id="imagen-url" name="imagen_url">

                <button type="submit" class="boton-guardar-mascota">Agregar mascota</button>
            </form>

            <script>
                const imagenInput = document.getElementById('foto');
                const imagenUrlInput = document.getElementById('imagen-url');
                const imagenPreview = document.getElementById('imagen-preview');
                const especiesRadios = document.querySelectorAll('input[name="especie"]');
                const imagenesPredeterminadas = {
                    1: 'https://cdn-icons-png.flaticon.com/512/9769/9769450.png',
                    2: 'https://cdn-icons-png.flaticon.com/512/1864/1864514.png',
                };

                especiesRadios.forEach(radio => {
                    radio.addEventListener('change', () => {
                        const especieId = radio.value;
                        if (imagenesPredeterminadas.hasOwnProperty(especieId) && !imagenInput.files[0]) {
                            imagenPreview.innerHTML =
                                `<img src="${imagenesPredeterminadas[especieId]}" alt="Imagen predeterminada">`;
                            imagenUrlInput.value = imagenesPredeterminadas[
                            especieId]; 
                        } else {
                            imagenPreview.innerHTML = '';
                        }

                    });
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

                        especiesRadios.forEach(radio => {
                            if (radio.checked) {
                                const especieId = radio.value;
                                if (imagenesPredeterminadas.hasOwnProperty(especieId)) {
                                    imagenPreview.innerHTML =
                                        `<img src="${imagenesPredeterminadas[especieId]}" alt="Imagen predeterminada">`;
                                    imagenUrlInput.value = imagenesPredeterminadas[especieId];
                                } else {
                                    imagenPreview.innerHTML = '';
                                }
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
@endsection
