    @extends('layouts.app')

    @section('title', 'Consultar Mascotas')

    @section('content')

    <link rel="stylesheet" href="{{ asset('css/consultarMascota.css') }}">

    <div class="container-consultar">
        <h1>Consultar Mascotas</h1>

        <!-- Campo de búsqueda -->
        <form method="GET" action="{{ route('admin.controldemascotasadmin') }}" class="form-busqueda">
            <input type="text" name="search" placeholder="Buscar mascota..." value="{{ request('search') }}">
            <button type="submit">
                <span>🔍</span> <!-- Agregar un icono de búsqueda -->
            </button>
        </form>

        <!-- Mostrar mascotas -->
        <div class="mascotas-lista">
            @if($mascotas->isEmpty())
                <p>No hay mascotas registradas.</p>
            @else
                <table class="mascotas-tabla">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Especie</th>
                            <th>Fecha de Nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mascotas as $mascota)
                            <tr>
                                <td><img src="{{ asset($mascota->foto) }}" alt="Imagen de la mascota" class="mascota-image"></td>
                                <td>{{ $mascota->nombre }}</td>
                                <td>{{ $mascota->raza->nombre }}</td>
                                <td>{{ $mascota->raza->especie->nombre }}</td>
                                <td>{{ $mascota->nacimiento ? \Carbon\Carbon::parse($mascota->nacimiento)->format('d/m/Y') : 'No especificado' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    @endsection
