<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

Route::get('/inicio', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/perfilusuario', function () {
    return view('perfilusuario');
});

Route::get('/editarperfilusuario', function () {
    return view('editarperfilusuario');
});

Route::get('/mascotas', function () {
    return view('mascotas');
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

Route::get('/inicio-web', function () {
    return view('welcome');
});
Route::get('/contactos', function () {
    return view('contactos.contactos');
});
Route::get('/historial-medico-mascota', function () {
    return view('hmm.card'); 
})->name('historial.medico');

Route::get('/historial-detallado-mascota', function(){
    return view('hmm.detallesCita');
})->name('detalles.cita');

Route::get('inicio-veterinario', function(){
    return view('veterinario.inicioVeterinario');
})->name('inicio.veterinario');

Route::get('/reservar-cita', function(){
    return view('citas.reservarCitas');
});

Route::get('/citas-agendadas', function(){
    return view('citas.citasAgendadas');
});

Route::get('/consultar-historial', function(){
    return view('veterinario.consultarHistorialMascota');
});

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
