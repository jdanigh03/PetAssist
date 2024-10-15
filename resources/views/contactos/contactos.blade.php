@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh;
            padding-top: 200px;
        }

        .container {
            flex-grow: 1;
            background-color: #F5F5DC;
            padding: 3rem;
            margin: 130px;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 200px;
            }
        }

        .container {
            flex-grow: 1;
            background-color: #F5F5DC;
            padding: 1rem;
            margin: 100px;

        }
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Envíanos Un Mensaje</h2>
                <form>
                    <label for="nombre">Tu Nombre</label>
                    <input type="text" name="nombre" id="nombre" required>

                    <label for="email">Tu E-mail</label>
                    <input type="email" name="email" id="email" required>

                    <label for="telefono">Tu Número Telefónico</label>
                    <input type="tel" name="telefono" id="telefono" required>

                    <label for="comentarios">Comentarios</label>
                    <textarea name="comentarios" id="comentarios" required></textarea>

                    <label>
                        <input type="checkbox" name="informacion"> Me interesa recibir más información y promociones
                    </label>

                    <button type="submit">Enviar</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3>Go Can Clínica Veterinaria</h3>
                <p>Cota Cota calle 30, La Paz, Zona Sur</p>
                <p>Tel: 123456789</p>
                <p>Email: contacto@gocanveterinaria.com</p>
                <a href="https://wa.me/69927071" target="_blank" id="whatsapp-button">
                    <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" style="width: 50px; height: 50px;">
                </a>

                <a href="https://www.facebook.com/CEIVETGOCAN" target="_blank" id="facebook-button">
                    <img src="{{ asset('img/facebook.png') }}" alt="Facebook" style="width: 50px; height: 50px;">
                </a>

            </div>
        </div>
    </div>
@endsection
