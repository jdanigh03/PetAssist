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
    public function productosPorCategoria($categoria)
    {
        $productos = ProductoPetshop::where('Categoria', $categoria)->get();
        return view('petshop.categoria', ['productos' => $productos, 'categoria' => $categoria]);
    }


    public function mostrarProducto(ProductoPetshop $producto)
    {
        $productosRelacionados = ProductoPetshop::where('Categoria', $producto->Categoria)
                                                ->where('ID_Producto', '!=', $producto->ID_Producto)
                                                ->inRandomOrder()
                                                ->limit(4)
                                                ->get();
        return view('producto.ver', compact('producto', 'productosRelacionados'));
    }
    public function buscar(Request $request)
    {
        $search = $request->input('search');
    
        $productos = ProductoPetshop::where('Nombre', 'LIKE', "%{$search}%")
                                    ->orWhere('Categoria', 'LIKE', "%{$search}%")
                                    ->orWhere('Descripcion', 'LIKE', "%{$search}%") // Si quieres buscar también en la descripción
                                    ->get();
    
        return view('petshop.resultados', compact('productos', 'search')); // Pasar el término de búsqueda a la vista
    }
}


