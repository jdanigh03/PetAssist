<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPetshop;
use Illuminate\Support\Facades\Log;
use App\Models\MovimientoInventario;

class ProductController extends Controller
{
    // Método para mostrar el formulario de agregar productos
    public function mostrarFormularioAgregar()
    {
        return view('admin.aumentarProducto');
    }

    // Método para agregar el producto y registrar el movimiento en el inventario
    public function agregarProducto(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'required|string', // Validar que la URL de la imagen esté presente
            'categoria' => 'required|string|max:100',
        ]);

        // Crear el producto
        $producto = new ProductoPetshop();
        $producto->Nombre = $request->input('nombre');
        $producto->Descripcion = $request->input('descripcion');
        $producto->Precio = $request->input('precio');
        $producto->Cantidad = $request->input('cantidad');
        $producto->Imagen = $request->input('imagen'); // Guardar la URL de ImgBB
        $producto->Categoria = $request->input('categoria');
        $producto->save();

        // Registrar el movimiento de inventario
        MovimientoInventario::create([
            'producto_id' => $producto->id,
            'cantidad' => $producto->Cantidad, // La cantidad ingresada
            'precio' => $producto->Precio, // El precio del producto
            'accion' => 'Ingreso', // Acción de ingreso al inventario
        ]);

        Log::info("Producto agregado: " . $producto->Nombre);

        // Redireccionar con mensaje de éxito
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

    // Método para mostrar los productos existentes
    public function mostrarProductos(Request $request)
    {
        $search = $request->input('search');

        // Filtrar los productos por nombre o categoría si hay una búsqueda
        $productos = ProductoPetshop::query()
            ->when($search, function ($query, $search) {
                return $query->where('Nombre', 'LIKE', "%{$search}%")
                             ->orWhere('Categoria', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('admin.consultarProducto', compact('productos'));
    }

    // Método para mostrar el formulario de actualizar productos
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

    // Método para actualizar el producto
    public function actualizarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'imagen' => 'required|string',
            'categoria' => 'required|string|max:100',
        ]);

        $producto = ProductoPetshop::find($request->producto_id);

        if ($producto) {
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('public/productos');
                $imagenPath = str_replace('public/', '/storage/', $imagenPath);
                $producto->Imagen = $imagenPath;
            }

            $producto->Nombre = $request->nombre;
            $producto->Descripcion = $request->descripcion;
            $producto->Precio = $request->precio;
            $producto->Cantidad = $request->cantidad;
            $producto->Categoria = $request->categoria;
            $producto->save();

            Log::info("Producto actualizado: " . $producto->Nombre);

            return redirect()->route('productos.actualizar')->with('success', 'Producto actualizado exitosamente');
        } else {
            return redirect()->route('productos.actualizar')->with('error', 'No se encontró el producto seleccionado');
        }
    }

    // Método para ver detalles de un producto
    public function verProducto($id)
    {
        $producto = ProductoPetshop::find($id);

        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        return view('producto.ver', compact('producto'));
    }

    // Método para ver los movimientos de inventario
    public function verMovimientos()
    {
        // Obtener todos los productos con sus movimientos de inventario
        $productos = ProductoPetshop::with('movimientos')->get();

        // Pasar los productos y sus movimientos a la vista
        return view('admin.movimientosInventario', compact('productos'));
    }

}
