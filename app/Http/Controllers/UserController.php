<?php

// UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function perfil()
    {
        // Suponiendo que el usuario está autenticado
        $user = auth()->user();


        return view('perfilusuario', compact('user'));
    }
}
