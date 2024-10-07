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
            <ul>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Enfoque</a></li>
                <li><a href="/login" class="button">Empezar ahora</a></li>
            </ul>
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
</body>
</html>
