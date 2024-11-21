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
    public function verProducto($id)
    {
        $producto = ProductoPetshop::findOrFail($id); // Encuentra el producto por su ID o lanza un error 404
        return view('verProducto', compact('producto')); // Retorna la vista 'verProducto' con los datos del producto
    }

}
