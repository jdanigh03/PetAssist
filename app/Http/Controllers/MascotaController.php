<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Raza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Especie;


class MascotaController extends Controller
{
    public function index()
{

    $mascotas = Auth::user()->mascotas;

    if ($mascotas == null) {
        $mascotas = collect([]);
    }



    return view('mascotas', ['mascotas' => $mascotas]);
}
    public function crear()
{
    $razas = Raza::all();
    $especies = Especie::all();
    return view('nuevamascota', compact('razas', 'especies'));
}

    public function guardar(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'especie' => 'required|exists:especies,id',
            'nombre' => 'required|string|max:255',
            'raza' => 'required|exists:razas,id',
            'nacimiento' => 'required|date',
            'imagen_url' => 'nullable|string', 
        ]);

        $mascota = new Mascota();
        $mascota->nombre = $validatedData['nombre'];
        $mascota->nacimiento = $validatedData['nacimiento'];
        $mascota->raza_id = $validatedData['raza'];
        $mascota->user_id = $validatedData['user_id'];
        $mascota->foto = $request->hasFile('foto') ? $request->file('foto')->store('public/mascotas') : $validatedData['imagen_url'];

        if ($request->hasFile('foto')) {
            
            $mascota->foto = $request->input('imagen_url');
        }else{
             $mascota->foto = $request->input('imagen_url');
        }


        $mascota->save();

        return redirect()->route('mascotas')->with('success', 'Mascota agregada correctamente.');
    }

    public function mostrarPerfil(Mascota $mascota)
    {

        return view('perfilmascotas', compact('mascota'));
    }


    public function eliminar(Mascota $mascota)
    {


        $mascota->delete();
        return redirect()->route('mascotas')->with('success', 'Mascota eliminada correctamente.');
    }
    
    public function actualizar(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|string', // Validación para la URL de la imagen
        ]);

        $mascota->nombre = $request->input('nombre');

        // Actualiza la foto solo si se proporciona una nueva URL
        if ($request->filled('imagen')) { 
            $mascota->foto = $request->input('imagen');
        }

        $mascota->save();

        return redirect()->route('mascotas.perfil', $mascota)->with('success', 'Mascota actualizada correctamente.');
    }
public function consultarHistorialMascota()
{
    $mascotas = Mascota::with('raza', 'raza.especie', 'user')->get(); // Obtén todas las mascotas con las relaciones necesarias
    return view('veterinario.consultarHistorialMascota', compact('mascotas'));
}
}