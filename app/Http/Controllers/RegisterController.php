<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tipo_imagen' => 'required|in:predeterminada,subir', 
            'profile_picture' => 'required_if:tipo_imagen,subir|string', 
            'imagen_predeterminada' => 'required_if:tipo_imagen,predeterminada|string',
        ]);

        $profilePictureUrl = null;

        if ($request->tipo_imagen === 'subir') {
            $profilePictureUrl = $request->input('imagen_subida_url');
        } else {
            $profilePictureUrl = '/img/perfilPredeterminado.png'; 
        }



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePictureUrl,
        ]);



        return redirect()->route('login.index')->with('success', 'Tu cuenta ha sido creada correctamente. Por favor, inicia sesión.');
    }
}