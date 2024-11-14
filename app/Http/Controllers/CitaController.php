<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mascota;
use App\Models\DetalleCita;

class CitaController extends Controller
{
    public function index()
    {
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

        $cita = Cita::create([ 
            'ID_Animal' => $request->mascota,
            'Fecha_Hora' => $request->fecha . ' ' . $request->hora,
            'motivo' => $request->motivo,
            'ID_Veterinario' => $request->veterinario,
            'user_id' => Auth::id(),
        ]);
    
    
        DetalleCita::create([
            'cita_id' => $cita->id,
            'tratamiento' => $request->input('tratamiento'),
            'medicamentos' => $request->input('medicamentos'),
            'observaciones' => $request->input('observaciones'),
            'pruebas_realizadas' => $request->input('pruebas_realizadas'),
        ]);
    
        return redirect()->route('citas.agendadas')->with('success', 'Cita reservada correctamente.');
    }

    public function citasAgendadas()
    {
        $user = Auth::user();
        $citas = Cita::query(); 
        
        if ($user->role === 'veterinario') {
            $citas->where('ID_Veterinario', $user->id); 
        } else {
            $citas->where('user_id', $user->id);
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
    $citas = Cita::where('ID_Animal', $mascota->id)
                  ->with('veterinario')
                  ->orderBy('Fecha_Hora', 'desc')
                  ->get();
    $citas = $citas->map(function ($cita) {
        $cita->fecha_formateada = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y');
        $cita->hora_formateada = Carbon::parse($cita->Fecha_Hora)->format('H:i');
        return $cita;
    });
    return view('hmm.card', compact('mascota', 'citas'));
}
public function mostrarDetalleCita(Cita $cita)
{
    $cita->fecha_formateada = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y');
    $cita->hora_formateada = Carbon::parse($cita->Fecha_Hora)->format('H:i');

    return view('hmm.detallesCita', compact('cita'));
}
public function mostrarFormularioConsulta()
{
    $veterinarioId = Auth::id(); // Obtener el ID del veterinario actual

    $citas = Cita::
                 where('ID_Veterinario', $veterinarioId) // Filtrar por el ID del veterinario
                 ->with('mascota')
                 ->get();

    if ($citas->isEmpty()) {
        return view('veterinario.ingresarConsulta', ['citas' => null])->with('mensaje', 'No hay citas disponibles para ingresar consultas.');
    }

    return view('veterinario.ingresarConsulta', compact('citas'));
}
     

public function guardarConsulta(Request $request)
{
    $validatedData = $request->validate([
        'cita_id' => 'required|exists:citas,id',
        'nombre_mascota' => 'required|string',
        'tratamiento' => 'nullable|string',
        'medicamentos' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'pruebas_realizadas' => 'nullable|string',
    ]);

    $detalleExistente = DetalleCita::where('cita_id', $validatedData['cita_id'])->first();
    if ($detalleExistente) {
        return redirect()->route('consultas.mostrar')->with('error', 'Ya existe una consulta para esta cita.');
    }

    DetalleCita::create([
        'cita_id' => $validatedData['cita_id'],
        'tratamiento' => $validatedData['tratamiento'],
        'medicamentos' => $validatedData['medicamentos'],
        'observaciones' => $validatedData['observaciones'],
        'pruebas_realizadas' => $validatedData['pruebas_realizadas'],
    ]);

    return redirect()->route('consultas.mostrar')->with('success', 'Consulta añadida correctamente.');
}
}