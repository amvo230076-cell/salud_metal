<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\recursosController; 

Route::resource('usuarios', UsuarioController::class);

// Pagina index (o por asi decirlo el login)
Route::get('/', function () {
    return redirect()->route('acceso');
});

Route::get('/usuarios/{id}/edit',[
    UsuarioController::class,'edit'
])->name('usuarios.edit');

Route::put('/usuarios/{id}', [
    UsuarioController::class, 'update' 
])->name('usuarios.update');

Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

// Verificacion de admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Ruta para el panel de administrador
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});

// Verificacion de usuarios
Route::middleware(['auth'])->group(function () {
    // Ruta para el panel de administrador
    Route::get('/lista-usuarios', [
        AuthController::class, 'usuarios'
    ])->name('usuarios');
});

Route::get('/recursos', [
    recursosController::class, 'recursos'
])->name('recursos');