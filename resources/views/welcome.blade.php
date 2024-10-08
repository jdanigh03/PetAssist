<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetAssist</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <span>PetAssist</span>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Enfoque</a></li>
                <li><a href="/login" class="button">Empezar ahora</a></li>
            </ul>
            <!-- Botón de tres líneas -->
            <div class="hamburger" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    

    <section class="hero">
        <div class="hero-text">
            <h1>PetAssist el sistema veterinario que necesitas</h1>
            <p>Lleva la administración de tu clínica veterinaria al siguiente nivel. PetAssist es la solución integral que te permite gestionar de manera eficiente tanto el cuidado de los animales como las operaciones de tu tienda de mascotas.</p>
            <a href="/login" class="button">Empezar ahora</a>
        </div>
        <div class="hero-image">
            <!-- Usamos el helper asset() para cargar la imagen del logo -->
            <img src="{{ asset('img/Logo PetAssist 2.webp') }}" alt="PetAssist Logo">
        </div>
    </section>
    <section class="features">
        <div class="feature-item">
            <h2>1</h2>
            <h3>Gestión veterinario</h3>
            <p>PetAssist te ofrece todas las herramientas necesarias para gestionar eficientemente las consultas, tratamientos y seguimiento de cada paciente. Optimiza el tiempo de atención y organiza todos los procesos clínicos en un solo lugar.</p>
        </div>
    
        <div class="feature-item">
            <h2>2</h2>
            <h3>Gestión de PetShop</h3>
            <p>Con PetAssist también podrás manejar tu inventario de productos, ventas, y pedidos de manera organizada. Mantén control de stock y gestiona tu tienda de mascotas de forma rápida y eficiente, desde cualquier dispositivo.</p>
        </div>
    
        <div class="feature-item">
            <h2>3</h2>
            <h3>Historial médico de las mascotas</h3>
            <p>Accede al historial médico completo de cada mascota con PetAssist. Ten toda la información importante a la mano, como vacunas, tratamientos previos y análisis clínicos, para brindar un servicio más preciso y personalizado.</p>
        </div>
    
        <div class="feature-item">
            <h2>4</h2>
            <h3>Control de inventario y suministros</h3>
            <p>Con PetAssist, olvídate de las sorpresas con tu inventario. Monitorea tus productos en tiempo real y gestiona pedidos de manera eficiente. Todo lo que necesitas para mantener tu clínica y tienda de mascotas funcionando sin problemas.</p>
        </div>
    
        <div class="feature-item">
            <h2>5</h2>
            <h3>Gestión de Clientes y Fidelización</h3>
            <p>Con PetAssist, no solo gestionas animales y productos, sino también a tus clientes. Mantén un registro detallado de cada cliente y sus mascotas, envía recordatorios automáticos para citas y vacunaciones, y ofrece promociones personalizadas para fomentar la fidelización y mejorar la experiencia del cliente.</p>
        </div>
    </section>
    <section class="about-section">
        <div class="about-content">
            <h1>Todo sobre PetAssist</h1>
            <p>
                PetAssist tiene la capacidad para combinar en un solo lugar la gestión veterinaria y la administración de una tienda de mascotas. Desde el historial médico completo de cada mascota hasta el control en tiempo real de inventarios y ventas, PetAssist te ofrece todas las funcionalidades necesarias para tener un negocio organizado y eficiente. 
            </p>
            <p>
                Si buscas una solución que te permita brindar un servicio personalizado y optimizado, PetAssist es la respuesta. Ofrecemos una plataforma diseñada para cubrir las necesidades tanto de pequeñas clínicas como de grandes centros veterinarios.
            </p>
            <p>
                Además, nuestros módulos de fidelización de clientes y recordatorios automáticos para citas y vacunaciones aseguran que tus clientes se sientan valorados y bien atendidos.
            </p>
            <p>
                Nuestro compromiso es claro: mejorar la vida de las personas y sus mascotas, ofreciendo una plataforma tecnológica avanzada y accesible para cualquier negocio del sector. La satisfacción del cliente es nuestra prioridad, y nos esforzamos para garantizar que cada usuario tenga una experiencia sin igual con nuestro sistema.
            </p>
        </div>
        <div class="about-image">
            <img src="{{ asset('img/Logo PetAssist 2.webp') }}" alt="Imagen de PetAssist">
        </div>
    </section>
    <section class="new-commitment-section">
        <div class="new-commitment-content">
            <h1>Nuestro compromiso es cuidar lo que más amas</h1>
            <div class="new-commitment-box">
                <p>
                    PetAssist está diseñado para ayudarte a brindar el mejor cuidado a las mascotas, facilitando la gestión clínica y de tienda de forma integrada. Desde el control del historial médico hasta la gestión de inventarios, PetAssist te ofrece una solución completa para que puedas centrarte en lo que realmente importa.
                </p>
            </div>
        </div>
    </section>
    <section class="service-section">
        <h1>Un servicio integral</h1>
        <div class="service-cards">
            <div class="service-card purple">
                <h2>Disponibilidad</h2>
                <p>
                    PetAssist está disponible en cualquier dispositivo, permitiéndote acceder a la información médica de las mascotas y al inventario de la tienda en tiempo real, desde donde estés. Siempre tendrás lo que necesitas a mano.
                </p>
            </div>
            <div class="service-card blue">
                <h2>Eficiencia</h2>
                <p>
                    Optimiza todos los procesos de tu clínica y tienda de mascotas en un solo lugar. Desde la gestión de consultas hasta el control del stock, PetAssist te ahorra tiempo, asegurando que cada tarea se realice de forma rápida y eficiente.
                </p>
            </div>
            <div class="service-card white">
                <h2>Confianza</h2>
                <p>
                    Con PetAssist, tus clientes sabrán que pueden confiar en ti para el cuidado de sus mascotas. El acceso fácil al historial médico y la atención personalizada mejoran la experiencia del cliente, fortaleciendo su lealtad.
                </p>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="footer-logo">
            <p>PetAssist</p>
        </div>
        <div class="footer-column">
            <h3>Contacto</h3>
            <p>+12345678</p>
            <p>petAssist@gmail.com</p>
        </div>
        <div class="footer-column">
            <h3>Dirección</h3>
            <p>La Paz, Bolivia</p>
        </div>
        <div class="footer-column">
            <h3>Redes Sociales</h3>
            <p>Facebook</p>
            <p>Instagram</p>
        </div>
    </footer>
            
    
</body>
<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</html>
