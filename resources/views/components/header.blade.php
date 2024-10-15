<style>
    body {
        padding-top: 50px;
    }

    .header {
        background-color: #F5F5DC;
        box-shadow: 0 1px 1px 2px #2F4F4F;
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
        margin-left: auto;
    }

    .container-boton-header img {}

    .login-button,
    .logout-button {
        background-color: #2F4F4F;
        color: #FFFFFF;
        padding: 0.7rem 1rem;
        border-radius: 203px;
        font-weight: bold;
        text-decoration: none;
        border: none;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logout-button:hover,
    .login-button:hover {
        background-color: #556B2F;
    }

    .noti {
        height: 18px;
    }

    .navegacion-header a {
        text-decoration: none;
        color: #2F4F4F;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .hamburger {
        background-color: #2F4F4F;
        border-radius: 203px;
        padding: 0.7rem 1rem;
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-left: auto;
    }

    .hamburger img {
        width: 18px;
    }

    .dropdown-menu {
        display: none;
        flex-direction: column;
        gap: 1rem;
        background-color: #F5F5DC;
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
        color: #2F4F4F;
        font-weight: bold;
        padding: 0.5rem 0;
    }

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
    function toggleMenu() {
        const dropdown = document.querySelector('.dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
    }
</script>

<header class="header">
    <div class="container-header">
        <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de la veterinaria" class="logo" href="/">

        <nav class="navegacion-header">
            @if (auth()->check())
                <a href="/">Inicio</a>
                <a href="/contactos">Contactos</a>
                <a href="/citas-agendadas">Agenda</a>
                <a href="/mascotas">Mascotas</a>
                <a href="/perfilusuario">Perfil</a>
            @else
                <a href="/">Inicio</a>
                <a href="/contactos">Contactos</a>
            @endif
        </nav>

        

        <div class="dropdown-menu">
            @if (auth()->check())
                <a href="/">Inicio</a>
                <a href="/petshop">PetShop</a>
                <a href="/contactos">Contactos</a>
                <a href="/citas-agendadas">Agenda</a>
                <a href="/mascotas">Mascotas</a>
                <a href="/perfilusuario">Perfil</a>
            @else
                <a href="/">Inicio</a>
                <a href="/contactos">Contactos</a>
            @endif
        </div>

        <div class="container-boton-header">
            @if (auth()->check())
            <div class="hamburger" onclick="toggleMenu()">
                <img src="https://www.clipartmax.com/png/full/77-773806_call-610-465-white-hamburger-menu-icon-png.png"
                    alt="">
            </div>
                <button type="submit" class="login-button">
                    <img src="https://static-00.iconduck.com/assets.00/notification-icon-2047x2048-qbq87wz5.png"
                        class="noti" alt="">
                </button>
            @endif
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