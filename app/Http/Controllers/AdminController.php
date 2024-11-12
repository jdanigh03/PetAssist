<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
    {
        public function index()
        {
            return view('admin.admin');
        }

        public function cambiarRol(Request $request)
        {
            // Validar los datos del formulario
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'role' => 'required|string',
            ]);
        
            // Buscar al usuario por el correo electrónico
            $user = User::where('email', $request->email)->first();
        
            if ($user) {
                // Cambiar el rol del usuario
                $user->role = $request->role;
                $user->save();
        
                // Retornar con un mensaje de éxito
                return redirect()->back()->with('success', 'Rol cambiado correctamente');
            }
        
            // Retornar con un mensaje de error si el usuario no se encuentra
            return redirect()->back()->withErrors(['email' => 'Usuario no encontrado']);
        }
        


}
