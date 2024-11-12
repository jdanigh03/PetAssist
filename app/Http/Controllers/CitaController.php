<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mascota;

class CitaController extends Controller
{
    public function index()
    {
        // Para la agenda general (probablemente del administrador), 
        // muestra todas las citas o puedes filtrarlas según tus necesidades.
        $citas = Cita::with('mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario')
                     ->get();
        return view('citas.agenda', ['citas' => $citas]); 
    }

    public function reservar()
    {
        $mascotas = Auth::user()->mascotas;
        $veterinarios = User::where('role', 'veterinario')->get();

        return view('citas.reservarCitas', compact('mascotas', 'veterinarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'motivo' => 'required|string',
            'veterinario' => 'nullable|exists:users,id', 
        ]);

        Cita::create([
            'ID_Animal' => $request->mascota,
            'Fecha_Hora' => $request->fecha . ' ' . $request->hora,
            'motivo' => $request->motivo,
            'ID_Veterinario' => $request->veterinario,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('citas.agendadas')->with('success', 'Cita reservada correctamente.');
    }

    public function citasAgendadas()
    {
        $user = Auth::user(); // Obtiene el usuario actual.
        $citas = Cita::query(); // Inicializa la consulta.
        
        if ($user->role === 'veterinario') {
            $citas->where('ID_Veterinario', $user->id); // Si el usuario es vet, muestra sus citas.
        } else {
            $citas->where('user_id', $user->id); // De lo contrario, las del usuario común.
        }


        $citas = $citas->with('mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario')
            ->get();

        $citas = $citas->map(function ($cita) {
            $cita->fecha = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y');
            $cita->hora = Carbon::parse($cita->Fecha_Hora)->format('H:i');
            return $cita;
        });

        return view('citas.citas-agendadas', ['citas' => $citas]);
    }
    public function historialMedicoMascota(Mascota $mascota)
{
    $citas = Cita::where('ID_Animal', $mascota->id) // Usa $mascota->id (que corresponde a ID_Animal en la tabla mascotas)
                  ->with('veterinario')
                  ->orderBy('Fecha_Hora', 'desc')
                  ->get();
    $citas = $citas->map(function ($cita) {
        $cita->fecha_formateada = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y'); // Formatea la fecha
        $cita->hora_formateada = Carbon::parse($cita->Fecha_Hora)->format('H:i'); // Formatea la hora
        return $cita;
    });
    return view('hmm.card', compact('mascota', 'citas')); // Pasa la mascota y las citas a la vista
}
}