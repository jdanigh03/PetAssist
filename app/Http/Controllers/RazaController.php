<?php

namespace App\Http\Controllers;

use App\Models\Raza;


class RazaController extends Controller
{
    public function obtenerRazasPorEspecie($especieId)
    {
        $razas = Raza::where('especie_id', $especieId)->get();
        return response()->json($razas);
    }
}