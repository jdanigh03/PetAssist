<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f5f5e7;
        color: #333;
        margin: 0;
    }

    .container-sin-sesion {
        margin: 3rem auto;
        background-color: #f5f5dc;
        padding: 2rem;
        border-radius: 8px;
        min-width: 350px;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid black;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    h1 {
        color: #333;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }

    h2 {
        color: #555;
        font-size: 1rem
    }

    p {
        color: #333;
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }

    .botones-autenticacion {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .boton-sin-sesion {
        display: inline-block;
        background-color: #2f4f4f;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .boton-sin-sesion:hover {
        background-color: #1f3f3f;
    }

    .logo-petassist {
        display: block;
        margin: 1rem auto;
        max-width: 200px;
        height: auto;
        border-radius: 20px;
    }

    @media (max-width: 600px) {
        .botones-autenticacion {
            flex-direction: column;
        }
    }
</style>
</head>

<body>
    <div class="container-sin-sesion">
        <h2>Esta función está disponible para los usuarios registrados en el sistema PetAssist</h2>
        <img src="https://i.imgur.com/ItWCcE1.png" alt="Logo de PetAssist" class="logo-petassist">
        <h1>¿Quiere ingresar al sistema?</h1>

        <div class="botones-autenticacion">
            <a href="/login" class="boton-sin-sesion">Iniciar sesión</a>
            <a href="/register" class="boton-sin-sesion">Registrarse</a>
        </div>
        <a href="/" class="boton-sin-sesion">Volver a página principal</a>
    </div>
