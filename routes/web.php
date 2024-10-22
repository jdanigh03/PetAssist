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

Route::get('/mascotas', function () {
    return view('mascotas');
})->middleware('auth');
Route::get('/nueva-mascota', function () {
    return view('nuevamascota');
})->middleware('auth');

Route::get('/mascotas/perfil', function () {
    return view('perfilmascotas');
})->middleware('auth');




Route::get('/pantallaproveedores', function () {
    return view('pantallaproveedores');
})->middleware('auth');

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

// Ruta para mostrar el formulario de actualizar productos
Route::get('actualizar-producto', [ProductController::class, 'mostrarFormularioActualizar'])->name('productos.actualizar');

// Ruta para procesar la actualización del producto
Route::post('actualizar-producto', [ProductController::class, 'actualizarProducto'])->name('productos.actualizar.confirmar');

Route::get('/', [PetshopController::class, 'index'])->name('welcome');
Route::get('/petshop', [PetshopController::class, 'petshop'])->name('petshop');
