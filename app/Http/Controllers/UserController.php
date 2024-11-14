<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function perfil()
    {
        
        $user = auth()->user();


        return view('perfilusuario', compact('user'));
    }
    public function actualizar(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telefono = $request->input('telefono');
        $user->direccion = $request->input('direccion');

        if ($request->filled('profile_picture')) {  // <--  Usar filled()
            $user->profile_picture = $request->input('profile_picture');
        }

        $user->save();

        return redirect()->route('perfilusuario')->with('success', 'Perfil actualizado correctamente.');
    }
}