@extends('layouts.app')

@section('content')
    <style>
        .container {
            background-color: #F5F5DC; /* Color de fondo beige */
            padding: 3rem;
            margin: 130px auto; /* Centrado en la página */
            max-width: 800px; /* Limitar el ancho máximo del contenedor */
            border-radius: 8px; /* Bordes redondeados para un toque moderno */
        }

        .lead {
            font-size: 1.25rem;
            color: #333; /* Color de texto oscuro */
        }

        h1, h3 {
            color: #2c3e50; /* Títulos en color oscuro para mayor contraste */
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        ul li {
            margin-bottom: 10px;
        }

        hr.my-4 {
            border-color: #ddd; /* Color suave para la línea horizontal */
        }

        .text-center {
            text-align: center;
        }

        p {
            color: #555; /* Texto más suave */
        }
    </style>

    <div class="container py-5">
        <h1 class="text-center mb-4">Aviso de Privacidad</h1>
        <p class="lead">En <strong>Go Can</strong>, nos comprometemos a proteger la privacidad de nuestros clientes, usuarios y visitantes. Este Aviso de Privacidad describe cómo recopilamos, utilizamos, compartimos y protegemos tu información personal cuando interactúas con nuestro sitio web, productos y servicios.</p>
        
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <h3 class="mt-4">1. Información que recopilamos</h3>
                <p>Recopilamos información personal que nos proporcionas directamente cuando te registras en nuestro sitio, realizas compras, nos contactas o usas nuestros servicios. Esto puede incluir:</p>
                <ul>
                    <li>Nombre completo</li>
                    <li>Dirección de correo electrónico</li>
                    <li>Dirección de envío</li>
                    <li>Número de teléfono</li>
                </ul>

                <h3 class="mt-4">2. ¿Cómo utilizamos tu información?</h3>
                <p>Usamos tu información personal para los siguientes fines:</p>
                <ul>
                    <li>Procesar y completar tus compras</li>
                    <li>Enviar actualizaciones de productos</li>
                    <li>Mejorar la experiencia de usuario en nuestro sitio</li>
                    <li>Gestionar y responder a consultas o problemas</li>
                    <li>Cumplir con obligaciones legales</li>
                </ul>

                <h3 class="mt-4">3. ¿Compartimos tu información?</h3>
                <p>No vendemos, alquilamos ni compartimos tu información personal con terceros para fines comerciales sin tu consentimiento. Sin embargo, podemos compartir tu información con proveedores y socios de confianza para ayudarnos a ofrecer nuestros servicios (por ejemplo, procesadores de pagos y servicios de envío).</p>

                <h3 class="mt-4">4. Seguridad de la información</h3>
                <p>Tomamos medidas razonables para proteger tu información personal de accesos no autorizados, alteraciones o destrucción. Sin embargo, ninguna medida de seguridad es 100% efectiva, por lo que no podemos garantizar la seguridad absoluta de tu información.</p>

                <hr class="my-4">
                <p class="text-center">© {{ date('Y') }} Go Can. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
@endsection
