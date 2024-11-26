<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go Can')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* General */
        :root {
    --primary: #2f4f4f;
    --secondary: #f5f5dc;
    --text-primary: #333;
    --text-secondary: #555;
}
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 4rem auto;
            margin-top:100px;
            background-color: #F5F5DC;
            padding: 2rem;
            border-radius: 8px;
            overflow-y: auto;
        }

        /* Encabezado */
        header {
            background-color: var(--secondary);
    box-shadow: 0 1px 1px 2px rgba(47, 79, 79, 0.3);
    padding: 10px 20px;
    --header-height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    transition: background-color 0.3s, padding 0.3s;
        }
        body.login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    body.login-page .container {
        flex-grow: 1;
        background-color: #f5f5dc;
        padding: 2rem;
        margin: 20px;
        margin-top: 300px;
        margin-bottom: 60px;
        padding-top: 50px;
    }

    body.login-page .login-title {
        color: #2f4f4f;
    }
        header .header-container {
            display: flex;
    align-items: center;
    gap: 10px;
        }

        header .header-container img {
            width: 50px;
    height: auto;
    border-radius: 50%;
        }

        header .header-logo {
            font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary);
    margin-left: 10px;
        }

        header .header-nav {
            display: flex;
    align-items: center;
    gap: 20px;
    padding-right: 30px;
        }

        header .header-nav ul {
            list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
        }

        header .header-nav ul li {
            margin-left: 0;
        }

        header .header-nav ul li a {
            font-size: 0.95rem;
    color: var(--primary);
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
        }

        header .header-nav ul li a:hover {
            background-color: rgba(47, 79, 79, 0.1);
            color: var(--text-secondary);
        }

        header .header-button {
            background-color: var(--primary);
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

        header .header-button:hover {
            background-color: #1f3f3f;
            transform: scale(1.05);
        }
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            z-index: -1;
        }


        /* Main */
        main {
            padding: 20px;
        }

        /* Pie de página */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #333;
            color: white;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="{{ asset('img/logoGoCan.png') }}" alt="Logo Go Can">
            <a href="/" class="header-logo">Go Can</a>
        </div>
        
        <nav class="header-nav">
            <ul>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#petshop">Petshop</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
            @if (auth()->check())
                <button class="header-button" onclick="window.location.href='/petshop'">Ingresar a PetAssist</button>
            @else
                <button class="header-button" onclick="window.location.href='/register'">Registrarse</button>
                <button class="header-button" onclick="window.location.href='/login'">Iniciar Sesión</button>
            @endif
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    @include('components.footer') {{-- Pie de página común --}}
</body>
</html>
