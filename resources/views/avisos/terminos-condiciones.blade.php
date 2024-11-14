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
        <h1 class="text-center mb-4">Términos y Condiciones</h1>
        <p class="lead">Bienvenido a <strong>Go Can</strong>. Al utilizar nuestros servicios y productos, aceptas los siguientes términos y condiciones. Por favor, lee cuidadosamente este documento antes de continuar.</p>
        
        <div class="row">
            <div class="col-12">
                <h3 class="mt-4">1. Aceptación de los términos</h3>
                <p>Al acceder o utilizar el sitio web <strong>Go Can</strong> y nuestros servicios, aceptas cumplir con estos términos y condiciones, junto con nuestra política de privacidad y cualquier otra política que se publique en el sitio. Si no estás de acuerdo con estos términos, por favor no utilices nuestros servicios.</p>

                <h3 class="mt-4">2. Uso del sitio y los servicios</h3>
                <p>Este sitio y los servicios de <strong>Go Can</strong> están destinados únicamente para personas mayores de 18 años. Al utilizar el sitio, garantizas que tienes la capacidad legal para aceptar estos términos.</p>
                <p>Te comprometes a utilizar el sitio solo con fines legales y de acuerdo con todas las leyes locales, estatales, nacionales e internacionales aplicables. Queda prohibido usar este sitio para realizar actividades ilegales o que infrinjan derechos de propiedad intelectual.</p>

                <h3 class="mt-4">3. Propiedad intelectual</h3>
                <p>Todo el contenido del sitio web, incluidos textos, imágenes, logotipos, marcas comerciales, gráficos, videos, y otros materiales, son propiedad de <strong>Go Can</strong> o de sus licenciantes y están protegidos por las leyes de propiedad intelectual. No está permitido copiar, modificar, distribuir o reproducir este contenido sin el permiso previo por escrito de Go Can.</p>

                <h3 class="mt-4">4. Productos y servicios</h3>
                <p>Los productos y servicios ofrecidos en el sitio web son descritos con la mayor precisión posible. Sin embargo, Go Can no garantiza que la información presentada sea exacta, completa o libre de errores. Nos reservamos el derecho de modificar, eliminar o actualizar cualquier producto o servicio sin previo aviso.</p>

                <h3 class="mt-4">5. Enlaces a terceros</h3>
                <p>Este sitio puede contener enlaces a sitios web de terceros. Go Can no tiene control sobre el contenido o las prácticas de privacidad de dichos sitios y no asume ninguna responsabilidad por ellos. Te recomendamos leer los términos y condiciones de cada sitio web de terceros que visites.</p>

                <h3 class="mt-4">6. Modificaciones a los términos</h3>
                <p>Go Can se reserva el derecho de modificar, actualizar o cambiar estos términos y condiciones en cualquier momento. Las modificaciones entrarán en vigencia inmediatamente después de su publicación en este sitio. Es tu responsabilidad revisar periódicamente los términos para estar al tanto de cualquier cambio.</p>

                <h3 class="mt-4">7. Limitación de responsabilidad</h3>
                <p>Go Can no se hace responsable por daños indirectos, especiales, incidentales o consecuentes que puedan surgir del uso del sitio web o de los productos adquiridos a través del mismo. Esto incluye, pero no se limita a, pérdidas de datos, interrupciones de servicio o daños a tu dispositivo.</p>

                <h3 class="mt-4">8. Ley aplicable</h3>
                <p>Estos términos y condiciones se rigen por las leyes del país o estado donde se encuentren ubicados los servicios de <strong>Go Can</strong>, sin tener en cuenta los principios sobre conflictos de leyes. Cualquier disputa relacionada con estos términos será resuelta en los tribunales competentes de dicha jurisdicción.</p>

                <hr class="my-4">
                <p class="text-center">© {{ date('Y') }} Go Can. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
@endsection
