<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPetshop;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // Método para mostrar el formulario de agregar productos
    public function mostrarFormularioAgregar()
    {
        return view('admin.aumentarProducto');
    }

    // Método para agregar el producto
    public function agregarProducto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria' => 'required|string|max:100',
        ]);

        // Manejar la imagen si se subió
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/productos');
            $imagenPath = str_replace('public/', '/storage/', $imagenPath);
        }

        // Crear el producto en la base de datos
        $producto = new ProductoPetshop();
        $producto->Nombre = $request->nombre;
        $producto->Descripcion = $request->descripcion;
        $producto->Precio = $request->precio;
        $producto->Cantidad = $request->cantidad;
        $producto->Imagen = $imagenPath;
        $producto->Categoria = $request->categoria;
        $producto->save();

        // Registrar en logs
        Log::info("Producto agregado: " . $producto->Nombre);

        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.aumentar')->with('success', 'Producto agregado exitosamente');
    }

    // Método para mostrar el formulario de eliminar productos y sus detalles en la misma vista
    public function mostrarFormularioEliminar(Request $request)
    {
        $productos = ProductoPetshop::all(); // Obtener todos los productos para el selector
        $producto = null;

        // Cargar los detalles si se ha seleccionado un producto
        if ($request->has('producto_id')) {
            $producto = ProductoPetshop::find($request->producto_id);
        }

        return view('admin.quitarProducto', compact('productos', 'producto'));
    }

    // Método para eliminar el producto
    public function eliminarProducto(Request $request)
    {
        $producto = ProductoPetshop::find($request->producto_id);

        if ($producto) {
            $producto->delete();
            Log::info("Producto eliminado: " . $producto->Nombre);
            return redirect()->route('productos.quitar')->with('success', 'Producto eliminado exitosamente');
        } else {
            return redirect()->route('productos.quitar')->with('error', 'No se encontró el producto seleccionado');
        }
    }
}
