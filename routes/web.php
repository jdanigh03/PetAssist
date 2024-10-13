<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

Route::get('/inicio', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/mascotas', function () {
    return view('mascotas');
})->middleware('auth');
Route::get('/mascotas/perfil', function () {
    return view('perfilmascotas');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/inicio-web', function () {
    return view('welcome');
});

Route::get('/historial-medico-mascota', function () {
    return view('hmm.card'); 
})->name('historial.medico');




Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
