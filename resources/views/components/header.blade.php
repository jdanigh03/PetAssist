<style>
    .header {
        background-color: #78D4CC;
        box-shadow: 0 1px 1px 2px black;
        margin: 0;
        width: auto;
    }

    .header .container-header {
        display: flex;
        align-items: center;
        align-content: center;
        padding: 1.5rem 1rem;
    }

    .header .logo {
        height: 3rem;
    }


    .container-boton-header {
        margin-left: auto;
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .header .login-button {
        background-color: #D3FF54;
        color: #222;
        padding: 0.7rem 1rem;
        border-radius: 203px;
        font-weight: bold;
        text-decoration: none;
        border-color: black;
        border-width: medium;
        transition: background-color 0.3s ease;
    }

    .header .login-button:hover {
        background-color: #b0e63a;
    }

    img {
        border-radius: 20px;
        margin-right: auto;
        scale: 125%;
    }

    .header .logout-button {
        background-color: #FF2D20;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 203px;
        font-weight: bold;
        text-decoration: none;
        border-color: black;
        border-width: medium;
        transition: background-color 0.3s ease;
    }

    .header .logout-button:hover {
        background-color: #CC2117;
    }

    .header .noti {
        height: 18px;
    }
    form{
        display: flex;
        align-self: center;
    }
</style>
<header class="header">
    <div class="container-header">
        <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de la veterinaria" class="logo">

        <div class="container-boton-header">
            @if (auth()->check())
                <form action="{{ route('login.destroy') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">
                        Cerrar Sesión
                    </button>
                </form>
                <button type="submit" class="login-button">
                    <img src="https://www.iconpacks.net/icons/1/free-bell-icon-860-thumb.png" class="noti"
                        alt="">
                </button>
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
