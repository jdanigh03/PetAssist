@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #F5F5DC;
        }

        .contener {
            width: 100%;
            max-width: 800px;
            background-color: #F5F5DC;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 130px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            /* Agrega espacio entre columnas */
        }

        .form-row .col-md-6 {
            flex: 1;
            /* Distribuye equitativamente el ancho */
        }

        .form-row .col-md-12 {
            width: 100%;
        }

        .enviar-form-contacto {
            background-color: #2f4f4f;
            color: #ffffff;
            padding: 0.75rem 2rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        footer {
            margin-top: 9rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                /* Ocupa más espacio en pantallas pequeñas */
            }

            .form-row {
                flex-direction: column;
                /* Pone los elementos en columna */
            }
        }
    </style>


    <div class="contener">
        <div class="row">
            <div class="col-md-12">
                <h2>Envíanos Un Mensaje</h2>
                <form>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="nombre">Tu Nombre</label>
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Tu E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="telefono">Tu Número Telefónico</label>
                            <input type="tel" name="telefono" id="telefono" required>
                        </div>
                        <div class="col-md-6">
                            <label for="colonia">Ciudad</label>
                            <input type="text" name="colonia" id="colonia">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="comentarios">Comentarios</label>
                            <textarea name="comentarios" id="comentarios" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label>
                                <input type="checkbox" name="informacion"> Me interesa recibir más información y promociones
                            </label>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="enviar-form-contacto" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
