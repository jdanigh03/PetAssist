<style>
   :root {
    --primary: #2f4f4f;
    --secondary: #f5f5dc;
    --text-primary: #333;
    --text-secondary: #555;
}

   body {
        padding-top: 50px;
        font-family: 'Poppins', sans-serif;

    }

    form {
        flex-direction: unset;
    }

    header {
        background-color: #f5f5dc;
        box-shadow: 0 1px 1px 2px rgba(47, 79, 79, 0.3);
        padding: 10px 20px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        transition: background-color 0.3s, padding 0.3s;
    }

    .container-header {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .logo {
        height: 4rem;
        margin-right: 20px;
        border-radius: 20px;
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

    .btn-submit {
        background-color: #2f4f4f;
        color: #ffffff;
        padding: 8px 18px;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s, transform 0.3s;
        margin-left: 10px;
        white-space: nowrap;
    }

    .btn-submit:hover {
        background-color: #1f3f3f;
        transform: scale(1.05);
    }

    nav {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-right: 30px;
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
        display: none;
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
        padding: 0.5rem 2rem;
    }

    .active {
        background-color: burlywood;
        padding: 0.5rem 2rem;
        border-radius: 203px;
        font-weight: bold;
        text-decoration: none;
        border: none;
    }

    .profile-container {
        margin-right: 1rem;
    }

    .profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #F5F5DC;
        box-shadow: 0 1px 1px 1px #2F4F4F;
        padding: 1rem;
        z-index: 1000;
        border: 1px solid #2F4F4F;
        border-radius: 5px;
    }

    .profile-menu a {
        display: block;
        padding: 0.5rem 1rem;
        color: #2F4F4F;
        text-decoration: none;
        background-image: url({{ asset('img/perfil.png') }});
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 16px 16px;
        padding-left: 30px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    .profile-menu a:hover,
    .logout-link:hover {
        background-color: #e0e0d1;
        border-radius: 10px;
    }

    .logout-link {
        background: none;
        border: none;
        padding: 0.5rem 1rem;
        color: #2F4F4F;
        text-decoration: none;
        cursor: pointer;
        background-image: url({{ asset('img/cerrarsesion.png') }});
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 16px 16px;
        padding-left: 30px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    nav {
    display: flex;
    align-items: center;
    gap: 20px;
    padding-right: 30px;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
    text-decoration: none; 
}

nav li {
    margin-left: 0;
}

nav li a {
    font-size: 0.95rem;
    color: var(--primary);
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    text-decoration: none; 
}

nav li a:hover {
    background-color: rgba(47, 79, 79, 0.1);
    color: var(--text-secondary);
    text-decoration: none; 
}
.logoTa {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary);
    margin-left: 10px;
    text-decoration: none; 
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
        @if (auth()->check() && auth()->user()->role != 'admin' && auth()->user()->role != 'veterinario')
    {{-- Muestra "Go Can" si no aparece el bloque de navegación --}}
    @if (!request()->is('petshop') && !request()->is('contactos') && !request()->is('citas-agenda') && !request()->is('mascotas'))
        <a href="/" class="logoTa">Go Can</a>
    @endif
@elseif (!auth()->check() || !isset(auth()->user()->role))
    {{-- Oculta "Go Can" con clase hidden --}}
    <a href="/" class="logoTa hidden">Go Can</a>
@endif
        <nav class="navegacion-header">
            @if (auth()->check())
                @if (auth()->user()->role == 'admin')
                    <a href="/" class="">Inicio</a>
                    <a href="/admin" class="{{ request()->is('gestion-productos') ? 'active' : '' }}">Control inventario</a>
                    <a href="/control-clientes" class="{{ request()->is('control-clientes') ? 'active' : '' }}">
                        Control de clientes
                    </a>
                    <a href="/control-personal" class="{{ request()->is('control-personal') ? 'active' : '' }}">
                        Control de personal
                    </a>
                @elseif (auth()->user()->role == 'veterinario')
                    <a href="/" class="">Inicio</a>
                    <a href="/inicio-veterinario" class="{{ request()->is('gestion-productos') ? 'active' : '' }}">Opciones de veterinario</a>
                @else
                    <a href="/petshop" class="{{ request()->is('petshop') ? 'active' : '' }}">Inicio</a>
                    <a href="/contactos" class="{{ request()->is('contactos') ? 'active' : '' }}">Contactos</a>
                    <a href="/citas-agenda" class="{{ request()->is('citas-agenda') ? 'active' : '' }}">Agenda</a>
                    <a href="/mascotas" class="{{ request()->is('mascotas') ? 'active' : '' }}">Mascotas</a>
                @endif
            @else
        

            @endif
        </nav>

        <div class="dropdown-menu">
            @if (auth()->check())
                @if (auth()->user()->role == 'admin')
                    <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">Inicio</a>
                    <a href="/gestion-productos"
                        class="{{ request()->is('gestion-productos') ? 'active' : '' }}">Gestión de productos</a>
                    <a href="/gestion-clientes" class="{{ request()->is('gestion-clientes') ? 'active' : '' }}">Gestión
                        de clientes</a>
                @else
                    <a href="/petshop" class="{{ request()->is('petshop') ? 'active' : '' }}">Inicio</a>
                    <a href="/contactos" class="{{ request()->is('contactos') ? 'active' : '' }}">Contactos</a>
                    <a href="/citas-agendadas"
                        class="{{ request()->is('citas-agendadas') ? 'active' : '' }}">Agenda</a>
                    <a href="/mascotas" class="{{ request()->is('mascotas') ? 'active' : '' }}">Mascotas</a>
                @endif
            @else
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
                <a href="/contactos" class="{{ request()->is('contactos') ? 'active' : '' }}">Contactos</a>
            @endif
        </div>

        <div class="container-boton-header">
            @if (auth()->check())
                {{-- <button type="submit" class="login-button">
                    <img src="https://static-00.iconduck.com/assets.00/notification-icon-2047x2048-qbq87wz5.png"
                        class="noti" alt="">
                </button> --}}

                <div class="hamburger" onclick="toggleMenu()">
                    <img src="https://www.clipartmax.com/png/full/77-773806_call-610-465-white-hamburger-menu-icon-png.png"
                        alt="">
                </div>
                <div class="profile-container">
                    <img src="{{ auth()->user()->profile_picture ?? '/img/perfilPredeterminado.png' }}"
                        alt="Foto de perfil" class="profile-picture" onclick="toggleProfileMenu()">
                    <div class="profile-menu" id="profileMenu">
                        @if (auth()->user()->role == 'admin')
                            <a href="/perfil">Ver mi perfil</a>
                        @else
                            <a href="/perfilusuario">Ver mi perfil</a>
                        @endif
                        <form action="{{ route('login.destroy') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-link">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            @else
            <nav>
            <ul>
        <li><a href="{{ url('/#servicios') }}">Servicios</a></li>
        <li><a href="{{ url('/#nosotros') }}">Nosotros</a></li>
        <li><a href="{{ url('/#petshop') }}">Petshop</a></li>
        <li><a href="{{ url('/#contacto') }}">Contacto</a></li>
             </ul>
                @if (auth()->check())
                    <button class="btn-submit" onclick="window.location.href='/petshop'">Ingresar a PetAssist</button>
                @else
                    <button class="btn-submit" onclick="window.location.href='/register'">Registrarse</button>
                    <button class="btn-submit" onclick="window.location.href='/login'">Iniciar Sesión</button>
                @endif
            </nav>
            @endif
        </div>
    </div>
</header>
<script>
    const navLinks = document.querySelectorAll('.navegacion-header a, .dropdown-menu a');


    navLinks.forEach(link => {

        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });

    function toggleProfileMenu() {
        const profileMenu = document.getElementById('profileMenu');
        profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
    }
</script>
