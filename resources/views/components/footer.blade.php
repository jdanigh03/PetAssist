<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">
    <style>
        body {
            font-family: Figtree, ui-sans-serif, sans-serif;
            background-color: #f5f5e7;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        /* Estilos del contenido */
        .content {
            flex: 1;
        }
        /* Estilos del pie de página */
        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
        }
        .social-buttons {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.social-icon {
    width: 60px;
    /* Ajusta el tamaño de los iconos */
    height: 60px;
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
    </style>
</head>
<body>
    <div class="content">
        <!-- Contenido de la página -->
    </div>

    <!-- Pie de página -->
    <footer class="footer">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
        
        <!-- Acerca de PETS+ -->
        <section>
            <h3 style="color: #F5F5F5; font-size: 24px;">Acerca de Go Can</h3>
            <p style="color: white; font-size: 16px;">Nacimos para ofrecer una atención médica veterinaria de calidad, con el mejor trato y hospitalidad hacia nuestros pacientes.</p>
        </section>


        <section>
            <h4 style="color: #F5F5F5; font-size: 20px;">Enlaces</h4>
            <ul style="list-style: none; padding: 0;">
            <li><a href="{{ route('aviso-privacidad') }}" style="color: white; text-decoration: none;">Aviso de privacidad</a></li>
            <li><a href="{{ route('terminos-condiciones') }}" style="color: white; text-decoration: none;">Términos y condiciones</a></li>
            </ul>
        </section>

        <section>
            <h4 style="color: #F5F5F5; font-size: 20px;">Escribenos si gustas</h4>
            <ul style="list-style: none; padding: 0; display: flex; justify-content: center; gap: 15px;">
               <div class="social-buttons">
                    <a href="https://wa.me/message/JTIX5UW6PVDXM1" target="_blank">
                        <img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" class="social-icon">
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100066704146049" target="_blank">
                        <img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="social-icon">
                    </a>
            </ul>
        </section>
    </div>

    <div style="margin-top: 30px; color: white; padding: 10px;">
        <p style="font-size: 14px;">&copy; {{ date('Y') }} Go Can. Todos los derechos reservados.</p>
    </div>
    </footer>
</body>
</html>
