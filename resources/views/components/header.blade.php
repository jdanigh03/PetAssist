<head>
    <style>
        body {
            padding-top: 50px;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-color: #F5F5DC;
            box-shadow: 0 1px 1px 2px #2F4F4F;
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
            border-radius: 20px;
        }

        .navegacion-header {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-grow: 1;
        }

        .navegacion-header a {
            text-decoration: none;
            color: #2F4F4F;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #F5F5DC;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #2F4F4F;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #e0e0d1;
        }

        .container-boton-header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .profile-container img {
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
            border: 1px solid #2F4F4F;
            border-radius: 5px;
            padding: 1rem;
            z-index: 1000;
        }

        .profile-container:hover .profile-menu {
            display: block;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container-header">
            <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de la veterinaria" class="logo" href="/">

            <nav class="navegacion-header">
                @if (auth()->check())
                    @if (auth()->user()->role == 'admin')
                        <div class="dropdown">
                            <a class="dropdown-toggle">Gestión de productos</a>
                            <div class="dropdown-content">
                                <a href="/aumentar-producto">Aumentar producto</a>
                                <a href="/quitar-producto">Quitar producto</a>
                                <a href="/consultar-producto">Consultar producto</a>
                                <a href="/actualizar-producto">Actualizar producto</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle">Gestión de clientes</a>
                            <div class="dropdown-content">
                                <a href="/historialusuariosmodificar">Control de citas</a>
                                <a href="/historialusuarios">Historial de visitas</a>
                                <a href="/controldemascotas">Control de mascotas</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle">Control de personal</a>
                            <div class="dropdown-content">
                                <a href="/cambiar-rol">Cambiar rol personal</a>
                                <a href="/generar-reporte">Generar reporte</a>
                                <a href="/movimientos-inventario">Movimientos inventario</a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role == 'proveedor')
                        <a href="/proveedor/inicio">Inicio</a>
                        <a href="/proveedores">Ofertar productos</a>
                    @else
                        <a href="/petshop">Inicio</a>
                        <a href="/contactos">Contactos</a>
                        <a href="/citas-agendadas">Agenda</a>
                        <a href="/mascotas">Mascotas</a>
                    @endif
                @else
                    <a href="/">Inicio</a>
                    <a href="/contactos">Contactos</a>
                @endif
            @else
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
                
                <!-- <a href="/contactos" class="{{ request()->is('contactos') ? 'active' : '' }}">Contactos</a>-->
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
                <button type="submit" class="login-button">
                    <img src="https://static-00.iconduck.com/assets.00/notification-icon-2047x2048-qbq87wz5.png"
                        class="noti" alt="">
                </button>

                <div class="hamburger" onclick="toggleMenu()">
                    <img src="https://www.clipartmax.com/png/full/77-773806_call-610-465-white-hamburger-menu-icon-png.png"
                        alt="">
                </div>
                <div class="profile-container">
                    <img src="{{ auth()->user()->profile_picture ?? '/img/perfilPredeterminado.png' }}" alt="Foto de perfil" class="profile-picture" onclick="toggleProfileMenu()">
                    <div class="profile-menu" id="profileMenu">
                        @if (auth()->user()->role == 'admin')
            </nav>
            
            <div class="container-boton-header">
                @if (auth()->check())
                    <div class="profile-container">
                        <img src="{{ auth()->user()->profile_picture ?? '/img/perfilPredeterminado.png' }}" alt="Foto de perfil" class="profile-picture">
                        <div class="profile-menu">
                            <a href="/perfil">Ver mi perfil</a>
                            <form action="{{ route('login.destroy') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-link">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/register" class="login-button">Registrarse</a>
                    <a href="/login" class="login-button">Iniciar Sesión</a>
                @endif
            </div>
        </div>
    </header>
</body>
