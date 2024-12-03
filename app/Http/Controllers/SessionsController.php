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
            $request->session()->regenerate(); // Importante: regenerar la sesión
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role == 'veterinario') {
                return redirect()->route('inicio.veterinario');
            } elseif ($user->role == 'proveedor') {
                return redirect()->route('control.inventario'); 
            } else {
                return redirect()->intended('/petshop'); 
            }
        }
    

        return back()->withErrors([
            'message' => 'Credenciales invalidas. Intente de nuevo',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        
        return redirect()->route('login.index');
    }
}