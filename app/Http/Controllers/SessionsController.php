<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller {
    
    public function create() {
        return view('auth.login'); 
    }

    public function store(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Verificar si es un administrador
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        
        // Si no es admin, redirigir a la página principal
        return redirect()->intended('/petshop');
    }

    return back()->withErrors([
        'message' => 'Invalid credentials, please try again.',
    ]);
}

    public function destroy() {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
