<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function avisoPrivacidad()
    {
        return view('avisos.aviso-privacidad'); // Ahora la vista está en la carpeta "avisos"
    }

    public function terminosCondiciones()
    {
        return view('avisos.terminos-condiciones'); // La otra vista también está en "avisos"
    }
}
