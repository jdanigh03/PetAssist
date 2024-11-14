@extends('layouts.app')

@section('title', 'Petshop')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5e7;
            padding-bottom: 100px;
            padding-top: 80px;
            overflow-y: auto;
            min-height: 100vh;
        }

        .home-cliente {
            align-items: center;
            padding: 20px;
            padding-bottom: 120px;
            margin-top: 60px;
            min-height: calc(100vh - 160px);
            padding-right: 100px;
            padding-left: 100px;
        }

        h1, h2, h3 {
            color: #000000;
        }

        .buscador {
            display: flex;
            width: 100%;
            max-width: 400px;
            background-color: #F5F5DC;
            border: 2px solid black;
            border-radius: 10px;
            padding: 8px;
            margin: 20px auto;
        }

        .buscador input[type="text"] {
            border: none;
            background: transparent;
            padding: 5px;
            width: 100%;
            font-size: 16px;
        }

        .buscador button {
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .carrusel {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }

        .carrusel img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .categorias {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .categorias a {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s ease;
            text-decoration: none;
            color: black;
            font-weight: bold;
            text-align: center;
        }

        .categorias a:hover {
            background-color: #f9f9f9;
            transform: translateY(-5px);
        }

        .container-img {
            font-size: 16px;
            color: #222;
            padding: 0.5rem 0.7rem;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sugerencias {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            gap: 20px;
            margin: 20px 0;
        }

        .sugerencia {
            display: flex;
            flex-direction: row;
            background-color: #F5F5DC;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            width: 30%;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sugerencia img {
            width: 100%;
            max-width: 150px;
            height: auto;
            object-fit: contain;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sugerencia-texto {
            flex: 1;
            display: flex;
            flex-direction: column;
            font-size: 14px;
            margin-left: 20px;
        }

        @media (max-width: 768px) {
            .home-cliente {
                padding-top: 0px;
            }

            .sugerencia {
                width: 100%;
            }
        }

        /* Estilos para el modal */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            position: relative;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .modal-content img {
            width: 100%;
            max-width: 250px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .modal-content h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .modal-content p {
            font-size: 16px;
            color: #555;
        }
    </style>

    <div class="home-cliente">
        <h1>Petshop</h1>

        <div class="buscador">
            <input type="text" placeholder="Buscar...">
            <button type="submit">
                <img src="{{ asset('img/buscar.png') }}" alt="Buscar" height="20">
            </button>
        </div>

        <div class="carrusel">
            <img src="{{ asset('img/image 38.png') }}" alt="Imagen 1">
        </div>

        <h2>Categorías</h2>
        <div class="categorias">
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/alimentos.png') }}" alt="Alimentos">
                </div>
                Alimentos
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/accesorios.png') }}" alt="Accesorios">
                </div>
                Accesorios
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/higiene.png') }}" alt="Higiene">
                </div>
                Higiene
            </a>
            <a href="#">
                <div class="container-img">
                    <img src="{{ asset('img/medicamentos.png') }}" alt="Medicamentos">
                </div>
                Medicamentos
            </a>
        </div>

        <h2>Sugerencias</h2>
        <div class="sugerencias">
            @foreach ($productos as $producto)
                <div class="sugerencia">
                    <img src="{{ asset($producto->Imagen) }}" alt="{{ $producto->Nombre }}">
                    <div class="sugerencia-texto">
                        <h3>{{ $producto->Nombre }}</h3>
                        <p>Precio: Bs {{ number_format($producto->Precio, 2) }}</p>
                        <a href="#" onclick="showModal('{{ $producto->Nombre }}', '{{ $producto->Descripcion }}', '{{ $producto->Precio }}', '{{ asset($producto->Imagen) }}')">Ver producto</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal para mostrar detalles del producto -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalProductImage" src="" alt="Imagen del Producto">
            <h3 id="modalProductName"></h3>
            <p id="modalProductDescription"></p>
            <p>Precio: Bs <span id="modalProductPrice"></span></p>
        </div>
    </div>

    <script>
        function showModal(nombre, descripcion, precio, imagen) {
            document.getElementById("modalProductName").innerText = nombre;
            document.getElementById("modalProductDescription").innerText = descripcion;
            document.getElementById("modalProductPrice").innerText = parseFloat(precio).toFixed(2);
            document.getElementById("modalProductImage").src = imagen;
            document.getElementById("productModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("productModal").style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("productModal");
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
@endsection
