@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
<div class="container">
    <div class="row">
        <!-- Formulario de contacto -->
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
            <h3>Kora Veterinaria</h3>
            <p>Ignacio Ramírez 2240, Zona Central, La Paz, Baja California Sur</p>
            <p>Tel: 612-129-3443</p>
            <p>Email: contacto@koraveterinaria.com.mx</p>
            <a href="https://wa.me/69927071" target="_blank" id="whatsapp-button">
    <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" style="width: 50px; height: 50px;">
            </a>
            
        <a href="https://www.facebook.com/kora.veterinaria" target="_blank" id="facebook-button">
            <img src="{{ asset('img/facebook.png') }}" alt="Facebook" style="width: 50px; height: 50px;">
        </a>
            
        </div>
    </div>
</div>
@endsection
