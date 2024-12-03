<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Regenerar la sesión para mayor seguridad
        $user = Auth::user();

        // Redirigir según el rol del usuario
        if ($user->role == 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->role == 'veterinario') {
            return redirect()->route('inicio.veterinario');
        } elseif ($user->role == 'recepcionista') {
            return redirect()->route('inicio.recepcionista'); 
        } else {
            return redirect()->intended('/petshop'); // Redirige a una página predeterminada si el rol no está especificado
        }
    }
    return back()->withErrors([
        'message' => 'Credenciales inválidas. Intente de nuevo',
    ]);
}


    public function destroy()
    {
        Auth::logout();
        
        return redirect()->route('login.index');
    }
}
