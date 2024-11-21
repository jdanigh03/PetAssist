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
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
        'imagen' => 'required|string', // Validar que la URL de la imagen esté presente
        'categoria' => 'required|string|max:100',
    ]);

    $producto = new ProductoPetshop();
    $producto->Nombre = $request->input('nombre');
    $producto->Descripcion = $request->input('descripcion');
    $producto->Precio = $request->input('precio');
    $producto->Cantidad = $request->input('cantidad');
    $producto->Imagen = $request->input('imagen'); // Guardar la URL de ImgBB
    $producto->Categoria = $request->input('categoria');
    $producto->save();

    Log::info("Producto agregado: " . $producto->Nombre);

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

    public function mostrarProductos()
    {
        $productos = ProductoPetshop::all(); // Obtener todos los productos del inventario
        return view('admin.consultarProducto', compact('productos'));
    }

    public function mostrarFormularioActualizar(Request $request)
    {
        $productos = ProductoPetshop::all(); // Obtener todos los productos para el selector
        $producto = null;

        // Cargar los detalles si se ha seleccionado un producto
        if ($request->has('producto_id')) {
            $producto = ProductoPetshop::find($request->producto_id);
        }

        return view('admin.actualizarProducto', compact('productos', 'producto'));
    }

    public function actualizarProducto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'required|string',
            'categoria' => 'required|string|max:100',
        ]);

        // Buscar el producto
        $producto = ProductoPetshop::find($request->producto_id);

        if ($producto) {
            // Manejar la imagen si se subió una nueva
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('public/productos');
                $imagenPath = str_replace('public/', '/storage/', $imagenPath);
                $producto->Imagen = $imagenPath;
            }

            // Actualizar los detalles del producto
            $producto->Nombre = $request->nombre;
            $producto->Descripcion = $request->descripcion;
            $producto->Precio = $request->precio;
            $producto->Cantidad = $request->cantidad;
            $producto->Categoria = $request->categoria;
            $producto->save();

            // Registrar en logs
            Log::info("Producto actualizado: " . $producto->Nombre);

            // Redirigir con un mensaje de éxito
            return redirect()->route('productos.actualizar')->with('success', 'Producto actualizado exitosamente');
        } else {
            return redirect()->route('productos.actualizar')->with('error', 'No se encontró el producto seleccionado');
        }
    }
        // In app/Http/Controllers/ProductController.php
public function verProducto($id)
{
    // Fetch the product using the provided ID
    $producto = ProductoPetshop::find($id);

    // If the product is not found, return a 404 page
    if (!$producto) {
        abort(404, 'Producto no encontrado');
    }

    // Return a view with the product details
    return view('producto.ver', compact('producto'));
}

}