@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('title', 'home')

@section('content')
    <style>
        .container-perfil-mascota {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
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
            background-color: #F5F5DC;
            padding: 20px;
            text-align: center;
        }

        .profile-image-mascota {
            width: 150px;
            height: 150px;
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
            padding: 20px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .profile-info p strong {
            font-weight: bold;
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

        .profile-info form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .profile-info input,
        .profile-info select {
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

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .preview-container {
            position: relative;
            margin-bottom: 10px;
            width: 150px;
            height: 150px;
            overflow: hidden;
        }

        #foto-perfil {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
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

        .btn-cambiar-foto:hover {
            background-color: #1f3f3f;
        }

        .preview-container {
            position: relative;
            margin-bottom: 10px;
            width: 150px;
            height: 150px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #preview,
        #loading {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        #loading {
            display: none;
        }
    </style>

    <div class="container-perfil-mascota">
        <h1>Perfil de {{ $mascota->nombre }}</h1>

        <div class="profile-card">
            <div class="profile-header">
                <div class="preview-container">
                    <img id="preview" src="{{ $mascota->foto }}" alt="Foto de perfil de {{ $mascota->nombre }}"
                        class="profile-image-mascota" onerror="this.src='/img/perfilPredeterminado.png'">
                    <img id="loading" src="/img/loading.gif" alt="Cargando...">
                    <input type="file" id="foto-perfil" name="foto-perfil" accept="image/*">
                    <label for="foto-perfil" class="btn-cambiar-foto">Cambiar foto</label>
                </div>
                <h1 class="profile-name">{{ $mascota->nombre }}</h1>
            </div>
            <div class="profile-info">
            <form id="form-editar-mascota" action="{{ route('mascotas.actualizar', $mascota) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" id="imagen-url" name="imagen">
    <span id="upload-error" style="color: red;"></span>

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $mascota->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" value="{{ $mascota->edad_string }}" readonly>
    </div>

    <div class="form-group">
        <label for="raza">Raza:</label>
        <input type="text" name="raza" value="{{ $mascota->raza->nombre }}" readonly>
    </div>

    <div class="form-group">
        <label for="especie">Especie:</label>
        <input type="text" name="especie" value="{{ $mascota->raza->especie->nombre }}" readonly>
    </div>

    <div class="actions">
        <button type="button" id="guardar-btn" class="btn btn-guardar">Guardar Cambios</button>
        <a href="{{ route('mascotas') }}" class="btn">Volver</a>
    </div>
</form>

            </div>

        </div>
    </div>
    <script>
        const fotoPerfilInput = document.getElementById('foto-perfil');
        const previewImage = document.getElementById('preview');
        const loadingImage = document.getElementById('loading');
        const imagenUrlInput = document.getElementById('imagen-url');
        const btnGuardar = document.querySelector('.btn-guardar');
        const uploadError = document.getElementById('upload-error');

        let imagenSubida = false;

        fotoPerfilInput.addEventListener('change', () => {
            const file = fotoPerfilInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(file);


                loadingImage.style.display = 'block';
                previewImage.style.display = 'none';
                uploadError.textContent = '';
                btnGuardar.disabled = true;

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
                            imagenSubida = true;
                            btnGuardar.disabled = false;
                            loadingImage.style.display = 'none';
                            previewImage.style.display = 'block';
                        } else {
                            uploadError.textContent = 'Error al subir la imagen.';
                            imagenSubida = false;
                            btnGuardar.disabled = true;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        uploadError.textContent = 'Error al subir la imagen.';
                        imagenSubida = false;
                        btnGuardar.disabled = true;
                    });
            }
        });



        const form = document.getElementById('form-editar-mascota');
        form.addEventListener('submit', (event) => {
            if (!imagenSubida && fotoPerfilInput.files.length > 0) {
                event.preventDefault();
                uploadError.textContent = 'Espera a que la imagen se suba o cancela la subida.';
            }
        });
        document.addEventListener('DOMContentLoaded', () => {
            const guardarBtn = document.getElementById('guardar-btn');
            const form = document.getElementById('form-editar-mascota');
            
            guardarBtn.addEventListener('click', () => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¿Quieres guardar los cambios?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, guardar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                    title: '¡Guardado!',
                    text: 'Los cambios se han guardado con éxito.',
                    icon: 'success'
                }).then(() => {
                    event.target.closest('form').submit();
                });
                        form.submit();
                    }
                });
            });
        });

    </script>
