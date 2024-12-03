<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mascota;
use App\Models\DetalleCita;
use Mpdf\Mpdf;

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
        $user = Auth::user();
        
        // Si el usuario es recepcionista, obtenemos todas las mascotas
        if ($user->role === 'recepcionista') {
            $mascotas = Mascota::all(); // Obtener todas las mascotas
        } else {
            // Si no es recepcionista, obtenemos solo las mascotas del usuario autenticado
            $mascotas = $user->mascotas;
        }

        // Obtener veterinarios
        $veterinarios = User::where('role', 'veterinario')->get();

        return view('citas.reservarCitas', compact('mascotas', 'veterinarios'));
    }

    public function store(Request $request)
    {
        // Validación de campos
        $request->validate([
            'mascota' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'motivo' => 'required|string',
            'veterinario' => 'nullable|exists:users,id', 
            'tratamiento' => 'nullable|string',
            'medicamentos' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'pruebas_realizadas' => 'nullable|string',
        ]);

        // Crear la cita
        $cita = Cita::create([ 
            'ID_Animal' => $request->mascota,
            'Fecha_Hora' => $request->fecha . ' ' . $request->hora,
            'motivo' => $request->motivo,
            'ID_Veterinario' => $request->veterinario,
            'user_id' => Auth::id(),
        ]);
    
        // Crear el detalle de la cita con valores opcionales
        DetalleCita::create([
            'cita_id' => $cita->id,
            'tratamiento' => $request->input('tratamiento', ''),
            'medicamentos' => $request->input('medicamentos', ''),
            'observaciones' => $request->input('observaciones', ''),
            'pruebas_realizadas' => $request->input('pruebas_realizadas', ''),
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
        $veterinarioId = Auth::id();

        $citas = Cita::where('ID_Veterinario', $veterinarioId)
                     ->with('mascota')
                     ->whereDoesntHave('detalle', function ($query) {
                         $query->whereNotNull('tratamiento')
                               ->orWhereNotNull('medicamentos')
                               ->orWhereNotNull('observaciones')
                               ->orWhereNotNull('pruebas_realizadas');
                     })
                     ->get();

        if ($citas->isEmpty()) {
            return view('veterinario.ingresarConsulta')->with('mensaje', 'No hay citas disponibles para ingresar consultas.');
        }

        return view('veterinario.ingresarConsulta', compact('citas'));
    }

    public function guardarConsulta(Request $request)
    {
        $validatedData = $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'tratamiento' => 'nullable|string',
            'medicamentos' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'pruebas_realizadas' => 'nullable|string',
        ]);

        // Verificar si existe un detalle para la cita
        $detalleCita = DetalleCita::where('cita_id', $validatedData['cita_id'])->first();

        if ($detalleCita) {
            // Si existe, actualizar los valores
            $detalleCita->update([
                'tratamiento' => $validatedData['tratamiento'] ?? '',
                'medicamentos' => $validatedData['medicamentos'] ?? '',
                'observaciones' => $validatedData['observaciones'] ?? '',
                'pruebas_realizadas' => $validatedData['pruebas_realizadas'] ?? '',
            ]);

            $mensaje = 'Consulta actualizada correctamente.';
        } else {
            // Si no existe, crear un nuevo detalle de cita
            DetalleCita::create([
                'cita_id' => $validatedData['cita_id'],
                'tratamiento' => $validatedData['tratamiento'] ?? '',
                'medicamentos' => $validatedData['medicamentos'] ?? '',
                'observaciones' => $validatedData['observaciones'] ?? '',
                'pruebas_realizadas' => $validatedData['pruebas_realizadas'] ?? '',
            ]);
            $mensaje = 'Consulta añadida correctamente.';
        }

        return redirect()->route('consultas.mostrar')->with('success', $mensaje);
    }

    public function mostrarHistorial()
    {
        $citas = Cita::with(['user', 'mascota', 'veterinario'])
                     ->orderBy('Fecha_Hora', 'desc')
                     ->get()
                     ->map(function ($cita) {
                         $cita->fecha = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y');
                         $cita->hora = Carbon::parse($cita->Fecha_Hora)->format('H:i A');
                         return $cita;
                     });

        // Pasar $citas a la vista
        return view('pantallahistorialusuariosmodificar', compact('citas'));
    }

    public function historialCitas()
    {
        $citas = Cita::with(['mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario', 'detalle'])
            ->where('Fecha_Hora', '<', now()) // Filtrar citas anteriores a la fecha actual
            ->orderBy('Fecha_Hora', 'desc')
            ->get();

        $citas = $citas->map(function ($cita) {
            $cita->fecha = Carbon::parse($cita->Fecha_Hora)->format('d/m/Y');
            $cita->hora = Carbon::parse($cita->Fecha_Hora)->format('H:i');
            return $cita;
        });

        return view('citas.historial', compact('citas'));
    }

    public function generarReportes(Request $request)
    {
        // Si el usuario ha seleccionado citas
        if ($request->has('citas')) {
            $citasSeleccionadas = Cita::whereIn('id', $request->input('citas'))->get();
            $mpdf = new Mpdf();
            $html = view('reportes.citas', compact('citasSeleccionadas'))->render();
            $mpdf->WriteHTML($html);
            return $mpdf->Output();
        }
    }
}
