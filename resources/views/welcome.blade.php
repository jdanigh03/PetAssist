<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Can</title>
    <link rel="stylesheet" hr¿¿ef="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <style>
        :root {
            --primary: #2F4F4F;
            --secondary: #F5F5DC;
            --text-primary: #333;
            --text-secondary: #555;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5e7;
            color: var(--text-primary);
            margin: 0;
        }

        a {
            text-decoration: none;
            color: var(--text-primary);
        }

        header {
            background-color: var(--secondary);

            box-shadow: 0 1px 1px 2px #2F4F4F;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;

        }

        .container-nav-inicio {
            padding-right: 30px;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
            order: 1;
        }

        nav {
            display: flex;
            align-items: center;
            order: 2;
            width: 100%;
            justify-content: space-around;
            margin-top: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav li {
            margin-left: 0;
        }

        .btn-submit {
            background-color: #2f4f4f;
            color: #ffffff;
            padding: 0.75rem 2rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
            white-space: nowrap;
        }

        /* Estilos de la sección hero */
        .hero {
            background-color: var(--primary);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero button {
            background-color: var(--secondary);
            color: var(--primary);
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilos de la sección "Sobre Nosotros" */
        .sobre-nosotros {
            padding: 40px 20px;
            text-align: center;
        }

        .sobre-nosotros h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        /* Estilos de la sección de servicios */
        .servicios {
            background-color: #f8f8f8;
            padding: 40px 20px;
        }

        .servicios h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--primary);
        }

        .servicios-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .servicio-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1 1 250px;
            min-width: 250px;
        }

        .servicio-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .servicio-card h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .servicio-card a {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Estilos de la sección "Contacto" */
        .contacto {
            background-color: #f5f5e7;
            padding: 40px 20px;
        }

        .contacto .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .contacto h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--primary);
            width: 100%;
            text-align: center;
        }

        .contacto form {
            flex: 1 1 400px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contacto form label {
            display: block;
            margin-bottom: 5px;
        }

        .contacto form input,
        .contacto form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contacto form textarea {
            height: 150px;
        }

        .contacto form button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .contacto .info {
            flex: 1 1 400px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contacto .info h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .contacto .info p {
            margin-bottom: 10px;
        }

        .social-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            /* Ajusta el tamaño de los iconos */
            height: 40px;
            border-radius: 50%;
            /* Haz que los iconos sean circulares */
            transition: transform 0.2s;
        }

        .social-icon:hover {
            transform: scale(1.1);
        }

        #whatsapp-button,
        #facebook-button {
            display: inline-block;
            padding: 10px;
            border-radius: 50%;
            transition: transform 0.2s;
        }

        #whatsapp-button:hover,
        #facebook-button:hover {
            transform: scale(1.1);
        }

        .mapa-vet-inicio {
            width: 100%;
        }

        .petshop {
            padding: 40px 20px;
            background-color: #f8f8f8;
        }

        .petshop h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--primary);
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }

        .product-card {
            scroll-snap-align: start;
            min-width: 250px;
            max-width: 250px;
            flex: 0 0 auto;
            margin-right: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .product-card p {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .product-card a {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .label-contacto {
            display: flex;
            flex-direction: column-reverse;
        }

        .label-contacto input {
            display: unset;
        }

        @media (max-width: 768px) {
            header {
                flex-wrap: unset;
            }

            .container-nav-inicio {
                scale: 0.8;
            }

            .btn-submit {
                padding: 0.55rem 1rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .sobre-nosotros h2 {
                font-size: 1.8rem;
            }

            .servicios h2,
            .contacto h2,
            .petshop h2 {
                font-size: 1.8rem;
            }

            .servicios-cards,
            .contacto .container {
                flex-direction: column;
            }

            .servicio-card,
            .contacto form,
            .contacto .info {
                flex: 1 0 100%;
            }

            .product-card {
                min-width: 50%;
            }

        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <a href="/" class="logo">Go Can</a>
        </div>
        <div class="container-nav-inicio">
            <nav>
                <ul>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#petshop">Petshop</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
                <button class="btn-submit" onclick="window.location.href='/register'">Registrarse</button>
                <button class="btn-submit" onclick="window.location.href='/login'">Iniciar Sesión</button>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>El mejor trato humano pensado para mascotas.</h1>
            <p>Somos una nueva experiencia veterinaria en Bolivia. Conoce nuestra sucursal o agenda tu cita.
                cita.</p>
            <button onclick="window.location.href='/login'">Agenda tu cita</button>
        </div>
    </section>
    <section class="sobre-nosotros" id="nosotros">
        <div class="container">
            <h2>Nosotros</h2>
            <p>Somos Go Can, una clínica veterinaria dedicada a brindar el mejor cuidado para tus mascotas. Contamos con
                un equipo de profesionales altamente capacitados y apasionados por el bienestar animal. </p>
        </div>
    </section>
    <section class="servicios" id="servicios">
        <div class="container">
            <h2>Servicios</h2>
            <div class="servicios-cards">
                <div class="servicio-card">
                    <img src="icono-bienestar.svg" alt="Bienestar">
                    <h3>Atención Médica</h3>
                    <p>Vacunas, chequeos, spa y limpieza dental para mascotas saludables.</p>
                    <a href="/login">Agendar Cita</a>
                </div>
                <div class="servicio-card">
                    <img src="icono-urgencias.svg" alt="Urgencias">
                    <h3>Petshop</h3>
                    <p>Encuentra todo lo que tu mascota necesita en nuestro petshop online.</p>
                    <a href="/login">Realizar Compras</a>
                </div>
            </div>
        </div>
    </section>




    <section class="petshop" id="petshop">
        <div class="container">
            <h2>Petshop</h2>
            <div class="carousel">
                @foreach ($productos as $producto)
                    <div class="product-card">
                        <img src="{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}">
                        <h3>{{ $producto->Nombre }}</h3>
                        <p>{{ $producto->Descripcion }}</p>
                        <p>Precio: ${{ number_format($producto->Precio, 2) }}</p>
                        <a href="/login">Ver producto</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="contacto" id="contacto">
        <div class="container">
            <h2>Contacto</h2>
            <form>
                <label for="nombre">Tu Nombre</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="email">Tu E-mail</label>
                <input type="email" name="email" id="email" required>

                <label for="telefono">Tu Número Telefónico</label>
                <input type="tel" name="telefono" id="telefono" required>

                <label for="comentarios">Comentarios</label>
                <textarea name="comentarios" id="comentarios" required></textarea>

                <label class="label-contacto">
                    <input type="checkbox" name="informacion">
                    Me interesa recibir más información y promociones
                </label>

                <button type="submit">Enviar</button>
            </form>

            <div class="info">
                <h3>Go Can Veterinaria</h3>
                <p>Ignacio Ramírez 2240, Zona Central, La Paz, Baja California Sur</p>
                <p>Tel: 612-129-3443</p>
                <p>Email: contacto@koraveterinaria.com.mx</p>
                <iframe class="mapa-vet-inicio"
                    src="https://www.google.com/maps/d/embed?mid=1L66q39sAMiYNQgbMAknyqkQT0Gsz-Ls&ehbc=2E312F"
                    height="480"></iframe>
                <div class="social-buttons">
                    <a href="https://wa.me/69927071" target="_blank">
                        <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" class="social-icon">
                    </a>
                    <a href="https://www.facebook.com/kora.veterinaria" target="_blank">
                        <img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="social-icon">
                    </a>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <p>© 2023 Go Can. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
