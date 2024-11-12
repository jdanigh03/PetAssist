<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PetshopController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\ProveedorController;

Route::get('/petshop', function () {
    return view('petshop');
});

Route::get('/historialusuariosmodificar', function () {
    return view('pantallahistorialusuariosmodificar');
});

Route::get('/controldemascotas', function () {
    return view('controldemascotasadmin');
});

Route::get('/historialusuarios', function () {
    return view('pantallahistorialusuarios');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfilusuario', function () {
    return view('perfilusuario');
});

Route::get('/editarperfilusuario', function () {
    return view('editarperfilusuario');
});
#Mascotas


Route::middleware('auth')->group(function () { 
    Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas'); 
    Route::get('/nueva-mascota', [MascotaController::class, 'crear'])->name('mascotas.crear');
    Route::post('/guardar-mascota', [MascotaController::class, 'guardar'])->name('mascotas.guardar');
    Route::get('/mascotas/perfil/{mascota}', [MascotaController::class, 'mostrarPerfil'])->name('mascotas.perfil');
    Route::delete('/mascotas/{mascota}', [MascotaController::class, 'eliminar'])->name('mascotas.eliminar');
    Route::put('/mascotas/{mascota}', [MascotaController::class, 'actualizar'])->name('mascotas.actualizar');
});

Route::get('/obtener-razas/{especie}', [RazaController::class, 'obtenerRazasPorEspecie']);


Route::post('/productos/subirImagen', [ProductController::class, 'subirImagen'])->name('productos.subirImagen');

Route::get('/proveedores', function(){
    return view('proveedor.proveedor');
});
// Ruta para mostrar la pantalla de oferta de productos para proveedores
Route::get('/proveedor/ofertar', [ProveedorController::class, 'mostrarFormularioOfertar'])->name('proveedor.ofertar');

// Ruta para procesar la oferta de productos
Route::post('/proveedor/ofertar', [ProveedorController::class, 'procesarOferta'])->name('proveedor.ofertar.procesar');


Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/contactos', function () {
    return view('contactos.contactos');
});
Route::get('/historial-medico-mascota', function () {
    return view('hmm.card'); 
})->name('historial.medico');

Route::get('/historial-detallado-mascota', function(){
    return view('hmm.detallesCita');
})->name('detalles.cita');

Route::get('/inicio-veterinario', function(){
    return view('veterinario.inicioVeterinario');
})->name('inicio.veterinario');

Route::get('/citas-agenda', [CitaController::class, 'index'])->name('citas.agenda');
    
Route::get('/reservar-cita', [CitaController::class, 'reservar'])->name('citas.reservar');


Route::post('/reservar-cita', [CitaController::class, 'store'])->name('citas.store');
Route::get('/citas-agendadas', [CitaController::class, 'citasAgendadas'])->name('citas.agendadas');

Route::get('/consultar-historial', function(){
    return view('veterinario.consultarHistorialMascota');
});

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::match(['get', 'post'], '/inicio', [SessionsController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');
Route::get('/', [PetshopController::class, 'index']);
Route::get('/petshop', [PetshopController::class, 'petshop']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('aumentar-producto', function(){
    return view('admin.aumentarProducto');
});

Route::get('aumentar-producto', [ProductController::class, 'mostrarFormularioAgregar'])->name('productos.aumentar');

Route::post('aumentar-producto', [ProductController::class, 'agregarProducto'])->name('productos.agregar');

Route::get('quitar-producto', function(){
    return view('admin.quitarProducto');
});

// Ruta para mostrar el formulario de agregar producto
Route::get('aumentar-producto', [ProductController::class, 'mostrarFormularioAgregar'])->name('productos.aumentar');

// Ruta para procesar la solicitud de agregar producto
Route::post('aumentar-producto', [ProductController::class, 'agregarProducto'])->name('productos.agregar');

// Ruta para mostrar el formulario de quitar producto y detalles
Route::get('quitar-producto', [ProductController::class, 'mostrarFormularioEliminar'])->name('productos.quitar');

// Ruta para eliminar el producto confirmado
Route::delete('quitar-producto', [ProductController::class, 'eliminarProducto'])->name('productos.eliminar');

Route::get('consultar-producto', function(){
    return view('admin.consultarProducto');
});

// Ruta para mostrar la página de consultar productos
Route::get('consultar-producto', [ProductController::class, 'mostrarProductos'])->name('productos.consultar');

Route::get('actualizar-producto', function(){
    return view('admin.actualizarProducto');
});

Route::get('cambiar-rol', function(){
    return view('admin.cambiarRol');
});

// Ruta para la sección de Control de Inventario
Route::get('control-inventario', function() {
    return view('admin.inventarioControl');
});

// Ruta para la sección de Control de Clientes
Route::get('control-clientes', function() {
    return view('admin.controlClientes');
});

// Ruta para la sección de Control de Personal
Route::get('control-personal', function() {
    return view('admin.controlPersonal');
});


// Ruta para mostrar el formulario de actualizar productos
Route::get('actualizar-producto', [ProductController::class, 'mostrarFormularioActualizar'])->name('productos.actualizar');

// Ruta para procesar la actualización del producto
Route::post('actualizar-producto', [ProductController::class, 'actualizarProducto'])->name('productos.actualizar.confirmar');

Route::get('/', [PetshopController::class, 'index'])->name('welcome');
Route::get('/petshop', [PetshopController::class, 'petshop'])->name('petshop');
Route::get('/perfilusuario', [UserController::class, 'perfil'])->name(name: 'perfilusuario');
Route::put('/actualizar-perfil', [UserController::class, 'actualizar'])->name('user.actualizar');
Route::post('/cambiar-rol', [AdminController::class, 'cambiarRol'])->name('admin.cambiarRol');
