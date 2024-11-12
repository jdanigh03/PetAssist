@extends('layouts.app')

@section('title', 'Cambiar Rol de Usuario')

@section('content')

<link rel="stylesheet" href="{{ asset('css/cambiarRol.css') }}">

<div class="container-cambiar-rol">
    <h1>Cambiar Rol de Usuario</h1>

    <!-- Formulario para cambiar rol -->
    <form action="{{ route('admin.cambiarRol') }}" method="POST">
        @csrf

        <!-- Correo electrónico del usuario -->
        <div class="form-group">
            <label for="email">Correo Electrónico del Usuario:</label>
            <input type="email" id="email" name="email" placeholder="Ingrese el correo electrónico" required>
        </div>

        <!-- Dropdown para seleccionar el nuevo rol -->
        <div class="form-group">
            <label for="role">Nuevo Rol:</label>
            <select id="role" name="role" required>
                <option value="">Seleccione un rol</option>
                <option value="admin">Administrador</option>
                <option value="veterinario">Veterinario</option>
                <option value="recepcionista">Recepcionista</option>
                <option value="proveedor">Proveedor</option>
                <option value="cliente">Cliente</option>
            </select>
        </div>

        <!-- Botón para cambiar el rol -->
        <button type="submit" class="btn-cambiar-rol">Cambiar Rol</button>
    </form>
</div>

<!-- Modal de éxito -->
@if(session('success'))
    <div id="successModal" class="modal">
        <div class="modal-content">
            <p>{{ session('success') }}</p>
            <button onclick="closeModal()" class="modal-btn">Aceptar</button>
        </div>
    </div>
@endif

<script>
    // Mostrar el modal si hay un mensaje de éxito
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            document.getElementById('successModal').style.display = "block";
        @endif
    });

    // Función para cerrar el modal
    function closeModal() {
        document.getElementById('successModal').style.display = "none";
    }
</script>

@endsection
