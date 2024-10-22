<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita; // Asegúrate de tener un modelo 'Cita'
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    // Mostrar la agenda de citas
    public function index()
    {
       
        $citas = Cita::where('user_id', Auth::id())->get();
        
        return view('citas.agenda', ['citas' => $citas]);
    }

    public function reservar()
    {
        return view('citas.reservarCitas');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'mascota' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'motivo' => 'required|string',
            'veterinario' => 'required|string'
        ]);

        // Crear y guardar la nueva cita
        Cita::create([
            'mascota' => $request->mascota,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'veterinario' => $request->veterinario,
            'user_id' => Auth::id(), // Asocia la cita con el usuario autenticado
        ]);

        // Redirigir a la agenda de citas
        return redirect()->route('citas.agenda');
    }
}
