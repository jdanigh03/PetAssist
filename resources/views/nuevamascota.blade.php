@extends('layouts.app')

@section('title', 'Nueva Mascota')

@section('content')
    <style>
        .nueva-mascota-layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            overflow-y: auto;
            max-height: 100vh;
            padding-bottom: 100px;
        }

        .container-nueva-mascota {
            background-color: #f5f5dc;
            padding: 2rem;
            border-radius: 8px;
            min-width: 350px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #2f4f4f;
            display: flex;
            flex-direction: column;
        }

        .titulo-nueva-mascota {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            text-align: left;
        }

        .formulario-mascota {
            display: unset;
        }

        .formulario-mascota label {
            color: #333;
            margin-bottom: 0.5rem;
            text-align: left;
            display: block;
        }

        .formulario-mascota input,
        .formulario-mascota select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #2f4f4f;
            border-radius: 5px;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        .boton-guardar-mascota {
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            align-self: flex-end;
        }

        .boton-guardar-mascota:hover {
            background-color: #1f3f3f;
        }

        .icono-especie {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .opciones-especie {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }
    </style>

    <div class="nueva-mascota-layout">
        <div class="container-nueva-mascota">
            <h2 class="titulo-nueva-mascota">Datos generales</h2>

            <form action="/guardar-mascota" method="POST" class="formulario-mascota">
                @csrf

                <label for="especie">Especie*</label>
                <div class="opciones-especie">
                    <input type="radio" id="perro" name="especie" value="Perro" checked>
                    <img src="https://cdn-icons-png.flaticon.com/512/9769/9769450.png" alt="Perro" class="icono-especie">
                    <label for="perro">Perro</label>

                    <input type="radio" id="gato" name="especie" value="Gato">
                    <img src="https://cdn-icons-png.flaticon.com/512/1864/1864514.png" alt="Gato" class="icono-especie">
                    <label for="gato">Gato</label>
                </div>

                <label for="nombre">Nombre de tu peludo*</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Firulais" required>

                <label for="raza">Raza*</label>
                <select id="raza" name="raza" required>
                    <option value="">Escoge una raza</option>
                    {{-- @foreach ($razas as $raza)
                    <option value="{{ $raza->id }}">{{ $raza->nombre }}</option>
                @endforeach  --}}
                </select>

                <label for="nacimiento">Nacimiento*</label>
                <input type="date" id="nacimiento" name="nacimiento" required>

                <button type="submit" class="boton-guardar-mascota">Agregar mascota</button>
            </form>
        </div>
    </div>
@endsection
