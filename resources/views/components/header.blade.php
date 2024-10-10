<style>
    .header {
        background-color: #78D4CC;
        box-shadow: 0 1px 1px 2px black;
        margin: 0;
        width: 100%;
        position: fixed;
        display: flex;
        justify-content: space-between;
        align-items: center;
        top: 0;
        z-index: 1000;
        padding: 0 20px;
        height: 80px;
    }

    .container-header {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .logo {
        height: 4rem;
        margin-right: 20px;
    }

    .navegacion-header {
        display: flex;
        gap: 2rem;
        align-items: center;
        flex-grow: 1;
    }

    .container-boton-header {
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-left: auto; /* Mueve los botones a la derecha */
    }

    .login-button,
    .logout-button {
        background-color: #D3FF54;
        color: #222;
        padding: 0.7rem 1rem;
        border-radius: 203px;
        font-weight: bold;
        text-decoration: none;
        border: 2px solid black;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logout-button {
        background-color: #FF2D20;
        color: white;
    }

    .login-button:hover {
        background-color: #b0e63a;
    }

    .logout-button:hover {
        background-color: #CC2117;
    }

    .noti {
        height: 18px;
    }

    .navegacion-header a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Estilos para el menú hamburguesa */
    .hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
    }

    .hamburger div {
        width: 25px;
        height: 3px;
        background-color: black;
    }

    /* Dropdown que aparece al hacer click en el menú hamburguesa */
    .dropdown-menu {
        display: none;
        flex-direction: column;
        gap: 1rem;
        background-color: #78D4CC;
        position: absolute;
        top: 80px;
        left: 0;
        width: 100%;
        padding: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999;
    }

    .dropdown-menu a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        padding: 0.5rem 0;
    }

    /* Estilos responsivos para móviles */
    @media (max-width: 768px) {
        .navegacion-header {
            display: none;
        }

        .hamburger {
            display: flex;
        }
    }
</style>

<script>
    // Función para mostrar/ocultar el menú dropdown en móviles
    function toggleMenu() {
        const dropdown = document.querySelector('.dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
    }
</script>

<!-- Header con Navegación Integrada -->
<header class="header">
    <div class="container-header">
        <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de la veterinaria" class="logo">

        <!-- Navegación normal en desktop -->
        <nav class="navegacion-header">
            <a href="#">Contactos</a>
            <a href="#">Agenda</a>
            <a href="#">Inicio</a>
            <a href="#">Mascotas</a>
            <a href="#">Perfil</a>
        </nav>

        <!-- Menú hamburguesa para móviles -->
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Dropdown que aparece cuando el menú hamburguesa es clicado -->
        <div class="dropdown-menu">
            <a href="#">Contactos</a>
            <a href="#">Agenda</a>
            <a href="#">Inicio</a>
            <a href="#">Mascotas</a>
            <a href="#">Perfil</a>
        </div>

        <!-- Botones de Login/Logout -->
        <div class="container-boton-header">
            <!-- Reordenar botones -->
            <button type="submit" class="login-button">
                <img src="https://www.iconpacks.net/icons/1/free-bell-icon-860-thumb.png" class="noti" alt="">
            </button>
            @if (auth()->check())
                <form action="{{ route('login.destroy') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="/register" class="login-button">
                    Registrarse
                </a>
                <a href="/login" class="login-button">
                    Iniciar Sesión
                </a>
            @endif
        </div>
    </div>
</header>
