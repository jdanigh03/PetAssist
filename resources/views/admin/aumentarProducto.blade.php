@extends('layouts.app')

@section('title', 'Aumentar Producto')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/aumentarProducto.css') }}">

    <div class="container-aumentar">
        <h1>Aumentar Producto</h1>
    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('productos.agregar') }}" method="POST" enctype="multipart/form-data" id="form-producto">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Juguete para perro" required>
            </div>
    
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="2" placeholder="Descripción del producto..."></textarea>
            </div>
    
            <div class="form-group-row">
                <div class="form-group">
                    <label for="precio">Precio (Bs):</label>
                    <input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 50.00" required>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" placeholder="Ej: 10" required>
                </div>
            </div>
    
            <div class="form-group-row">
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen_archivo" accept="image/*">
                    <button type="button" id="btn-subir-imagen">Subir Imagen</button>
                    <div id="imagen-preview"></div>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Selecciona una categoría</option>
                        <option value="Juguetes">Juguetes</option>
                        <option value="Comida">Comida</option>
                        <option value="Accesorios">Accesorios</option>
                        <option value="Medicamentos">Medicamentos</option>
                    </select>
                </div>
            </div>
            
    
            <button type="submit" class="btn-agregar">Agregar Producto</button>
        </form>
    </div>
    

    <script>
    const btnSubirImagen = document.getElementById('btn-subir-imagen');
    const imagenInput = document.getElementById('imagen');
    const imagenUrlInput = document.getElementById('imagen-url');
    const imagenPreview = document.getElementById('imagen-preview');

    btnSubirImagen.addEventListener('click', () => {
        const file = imagenInput.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onloadend = function() {
                const formData = new FormData();
                formData.append('key', '81fd551e66f3e290dce7e02e4f730eac'); // Tu API Key
                formData.append('image', reader.result.split(',')[1]); // Enviar la imagen en base64

                fetch("https://api.imgbb.com/1/upload", {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            imagenUrlInput.value = data.data.url;
                            imagenPreview.innerHTML = `<img src="${data.data.url}" width="100">`;
                            console.log(data.data.url);
                        } else {
                            alert(data.error);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            reader.readAsDataURL(file);
        } else {
            alert('Selecciona una imagen primero.');
        }
    });
</script>

@endsection
