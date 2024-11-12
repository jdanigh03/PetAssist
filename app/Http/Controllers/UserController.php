<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function perfil()
    {
        
        $user = auth()->user();


        return view('perfilusuario', compact('user'));
    }
}
