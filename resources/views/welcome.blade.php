<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Can</title>
    <link rel="stylesheet" hr¿¿ef="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{asset('css/goCan.css')}}">
</head>

<body>
    <header>
        <div class="container">
            <img src="{{asset('img/logoGoCan.png')}}" alt="">
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
            <p>Somos una nueva experiencia veterinaria en Bolivia. Conoce nuestra sucursal o agenda tu cita.</p>
            <button onclick="window.location.href='/login'">Agenda tu cita</button>
        </div>
    </section>
    <section class="sobre-nosotros" id="nosotros">
        <div class="container">
            <h2>Nosotros</h2>
            <p>Somos Go Can, una clínica veterinaria dedicada a brindar el mejor cuidado para tus mascotas. Contamos con
                un equipo de profesionales altamente capacitados y apasionados por el bienestar animal. Ofrecemos una
                experiencia única basada en el amor y la empatía hacia las mascotas, asegurando su salud y felicidad a
                través de servicios de calidad y atención personalizada.</p>
            
            <div class="valores-container">
                <div class="valor-card">
                    <h3>Misión</h3>
                    <p>Nuestra misión es proporcionar cuidado veterinario de alta calidad que garantice el bienestar y la
                        salud de las mascotas, creando un vínculo de confianza con sus dueños mediante atención
                        profesional y afectuosa.</p>
                </div>
                <div class="valor-card">
                    <h3>Visión</h3>
                    <p>Ser la clínica veterinaria líder en Bolivia, reconocida por nuestro compromiso con la salud animal,
                        innovación en servicios y un enfoque centrado en el amor por las mascotas.</p>
                </div>
                <div class="valor-card">
                    <h3>Valores Éticos</h3>
                    <p>Nos guiamos por valores como el respeto, la responsabilidad, la integridad y la compasión, asegurando
                        que cada mascota reciba el mejor trato posible, mientras promovemos prácticas sostenibles y éticas
                        en nuestro trabajo diario.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="servicios" id="servicios">
        <div class="container">
            <h2>Servicios</h2>
            <div class="servicios-cards">
                <div class="servicio-card">
                    <img src="{{asset('img/Bienestar.jpg')}}" alt="Bienestar">
                    <h3>Atención Médica</h3>
                    <p>Vacunas, chequeos, spa y limpieza dental para mascotas saludables.</p>
                    <a href="/login" class="btn-servicio">Agendar Cita</a>
                </div>
                <div class="servicio-card">
                    <img src="{{asset('img/petshop.avif')}}" alt="Urgencias">
                    <h3>Petshop</h3>
                    <p>Encuentra todo lo que tu mascota necesita en nuestro petshop online.</p>
                    <a href="/login" class="btn-servicio">Realizar Compras</a>
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
                    <a href="https://wa.me/message/JTIX5UW6PVDXM1" target="_blank">
                        <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" class="social-icon">
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100066704146049" target="_blank">
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

    <<script>
        document.addEventListener("DOMContentLoaded", function() {
            const header = document.querySelector("header");
            let lastScrollTop = 0;
    
            window.addEventListener("scroll", function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
                if (scrollTop > lastScrollTop) {
                    header.classList.add("nav-scroll");
                    console.log("Scroll hacia abajo, clase añadida", header.classList);
                } else if (scrollTop === 0) {
                    header.classList.remove("nav-scroll");
                    console.log("De vuelta arriba, clase eliminada", header.classList);
                }
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            });
        });
    </script>
    
</body>

</html>
