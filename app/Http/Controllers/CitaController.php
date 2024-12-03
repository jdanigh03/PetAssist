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

    $detalleCita = DetalleCita::where('cita_id', $validatedData['cita_id'])->first();

    if ($detalleCita) {
        $detalleCita->update([
            'tratamiento' => $validatedData['tratamiento'],
            'medicamentos' => $validatedData['medicamentos'],
            'observaciones' => $validatedData['observaciones'],
            'pruebas_realizadas' => $validatedData['pruebas_realizadas'],
        ]);

        $mensaje = 'Consulta actualizada correctamente.';
    } else {
        DetalleCita::create([
            'cita_id' => $validatedData['cita_id'],
            'tratamiento' => $validatedData['tratamiento'],
            'medicamentos' => $validatedData['medicamentos'],
            'observaciones' => $validatedData['observaciones'],
            'pruebas_realizadas' => $validatedData['pruebas_realizadas'],
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
        // Obtener las citas seleccionadas
        $citasSeleccionadas = Cita::with('mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario')
                                  ->whereIn('id', $request->input('citas'))
                                  ->get();

        // Pasamos las citas seleccionadas a la vista de reporte
        return view('admin.paginaReporte', [
            'citas' => $citasSeleccionadas,
            'fechaSolicitud' => Carbon::now()->format('d/m/Y H:i'),
            'solicitante' => auth()->user()->name,
        ]);
    }

    // Si no hay citas seleccionadas, mostrar todas las citas disponibles
    $citas = Cita::with('mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario')->get();

    return view('admin.generarReportes', compact('citas'));
}

public function generarPDF(Request $request)
{
    // Obtener las citas seleccionadas del formulario
    $citasIds = $request->input('citas');
    
    // Obtener las citas seleccionadas de la base de datos
    $citas = Cita::with('mascota', 'mascota.raza', 'mascota.raza.especie', 'veterinario')
                 ->whereIn('id', explode(',', $citasIds))
                 ->get();

    // Generar el HTML para el PDF
    $html = view('admin.paginaReporte', [
        'citas' => $citas,
        'fechaSolicitud' => Carbon::now()->format('d/m/Y H:i'),
        'solicitante' => auth()->user()->name,
    ])->render();

    // Crear una instancia de Mpdf
    // $mpdf = new Mpdf();

    // Escribir el HTML en el PDF
    // $mpdf->WriteHTML($html);

    // // Descargar el PDF
    // return $mpdf->Output('reporte_citas.pdf', 'D');
}


}