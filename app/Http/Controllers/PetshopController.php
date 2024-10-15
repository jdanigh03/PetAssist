<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPetshop; // Asegúrate de importar el modelo

class PetshopController extends Controller
{
    public function index()
    {
        $productos = ProductoPetshop::all(); // Obtiene todos los productos
        return view('welcome', ['productos' => $productos]); 

    }
    public function petshop()
    {
        $productos = ProductoPetshop::all();
        return view('petshop', ['productos' => $productos]);
    }
    }
