<style>
    .navegacion-footer {
        background-color: #4ed8a0;
        border: 3px solid black;
        border-radius: 20px;
        padding: 1rem;
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 100;
    }

    .navegacion-footer a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .navegacion-footer img,
    .navegacion-footer svg {
        width: 24px;
        height: 24px;
        margin: 0.5rem;
    }
</style>

<div class="navegacion-footer">
    <a href="#">
        <img src="{{ asset('img/contactos.png') }}" alt="Contactos">
        Contactos
    </a>
    <a href="#">
        <img src="{{ asset('img/agenda.png') }}" alt="Agenda">
        Agenda
    </a>
    <a href="#">
        <img src="{{ asset('img/inicio.png') }}" alt="Inicio">
        Inicio
    </a>
    <a href="#">
        <img src="{{ asset('img/mascotas.png') }}" alt="Mascotas">
        Mascotas
    </a>
    <a href="#">
        <img src="{{ asset('img/perfil.png') }}" alt="Perfil">
        Perfil
    </a>
</div>
