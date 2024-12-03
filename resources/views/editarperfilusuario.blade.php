@extends('layouts.app')

@section('title', 'home')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')

    <style>
        .container-perfil-mascota {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            margin-top: 70px;
            margin-bottom: 20px;
            overflow-y: auto;
            padding-bottom: 50px;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }

        .profile-header {
            position: relative;
            background-color: #F5F5DC;
            padding: 20px;
            text-align: center;
        }

        .profile-header2 {
            background-color: #F5F5DC;
            padding: 10px;
            flex-wrap: wrap;
            justify-content: center;
            display: flex;
        }

        .profile-image-mascota {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .profile-image-mascota2 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .profile-name {
            font-size: 20px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .profile-info {
            padding: 10px;
            position: relative;
            right: -10px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .profile-info p strong {
            font-weight: bold;
        }

        .profile-info form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .profile-info input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-info .actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn {
            display: block;
            background-color: #2F4F4F;
            color: #FFFFFF;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #556B2F;
        }

        .mascota-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 150px;
        }

        .editar-boton {
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            padding: 0;
            cursor: pointer;
        }

        .editar-boton img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .editar-boton2 {
            position: absolute;
            top: 0px;
            right: 30px;
            background-color: transparent;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            padding: 0;
            cursor: pointer;
        }

        .editar-boton2 img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #preview-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin-bottom: 1rem;
            position: relative;
        }

        #preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #loading-gif {
            width: 50px;
            height: auto;
        }

        .btn-cambiar-foto {
            background-color: #2F4F4F;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            transition: background-color 0.3s ease;
            font-size: 0.8rem;
        }

        #loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="container-perfil-mascota">
        <h1>Editar Perfil</h1>

        <div class="profile-card">
            <div class="profile-header">
                <div id="preview-container">
                    <img src="{{ Auth::user()->profile_picture }}" alt="Foto de perfil" class="profile-image-mascota"
                        onerror="this.src='/img/perfilPredeterminado.png'">
                    <img id="loading-gif" src="/img/loading.gif" alt="Cargando..." style="display: none;"> <input
                        type="file" id="profile_picture" name="profile_picture" accept="image/*" style="display: none;">
                    <label for="profile_picture" class="btn btn-cambiar-foto">Cambiar Imagen</label>
                    <div id="imagen-preview"></div>

                </div>
            </div>



            <div class="profile-info">
                <form action="{{ route('user.actualizar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="imagen-url" name="profile_picture">



                    <div class="form-group">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" id="nombre" name="name" value="{{ Auth::user()->name }}" required>
                    </div>


                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" value="{{ Auth::user()->direccion }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>

                    <div class="actions">
    <button type="submit" class="btn" id="guardar-cambios">Guardar Cambios</button>
</div>
                </form>
            </div>

        </div>
    </div>
    <div id="loading-overlay">
        <img id="loading-gif" src="/img/loading.gif" alt="Cargando...">
    </div>


    <script>
        const imagenInput = document.getElementById('profile_picture');
        const imagenUrlInput = document.getElementById('imagen-url');
        const previewContainer = document.getElementById('preview-container');
        const loadingGif = document.getElementById('loading-gif');
        const loadingOverlay = document.getElementById('loading-overlay');
        const submitButton = document.querySelector('.actions button[type="submit"]');


        previewContainer.addEventListener('click', () => {
            imagenInput.click();
        });

        imagenInput.addEventListener('change', () => {
            const file = imagenInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {


                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Foto de perfil';
                    img.classList.add('profile-image-mascota');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);


                    loadingGif.style.display = 'block';
                    loadingOverlay.style.display = 'flex';
                    submitButton.disabled = true;

                    const formData = new FormData();
                    formData.append('key', '81fd551e66f3e290dce7e02e4f730eac');
                    formData.append('image', file);



                    fetch("https://api.imgbb.com/1/upload", {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                imagenUrlInput.value = data.data.url;
                                console.log(data.data.url);
                                loadingOverlay.style.display = 'none';
                                submitButton.disabled = false;
                            } else {
                                alert(data.error);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Hubo un error al subir la imagen");
                        })
                        .finally(() => {
                            loadingGif.style.display = 'none';
                            loadingOverlay.style.display = 'none';
                            submitButton.disabled =
                                false;

                        });

                }
                reader.readAsDataURL(file);

            }
        });

        document.getElementById('guardar-cambios').addEventListener('click', function (event) {
        event.preventDefault(); // Evita el envío inmediato del formulario
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡Vas a guardar los cambios realizados!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, guardar cambios',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: '¡Guardado!',
                    text: 'Los cambios se han guardado con éxito.',
                    icon: 'success'
                }).then(() => {
                    // Envía el formulario tras la confirmación
                    event.target.closest('form').submit();
                });
            }
        });
    });
    </script>
@endsection
