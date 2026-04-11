<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\recursosController; 
use App\Http\Controllers\CitaController; 

Route::resource('usuarios', UsuarioController::class);

// Pagina index (o por asi decirlo el login)
Route::get('/', function () {
    return redirect()->route('acceso');
});

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
Route::middleware(['admin'])->group(function () {
    // Ruta para el panel de administrador
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');

    Route::get('/usuarios/{id}/edit',[
        UsuarioController::class,'edit'
    ])->name('usuarios.edit');

    Route::put('/usuarios/{id}', [
        UsuarioController::class, 'update' 
    ])->name('usuarios.update');
});

// Verificacion de alumno
Route::middleware(['alumno'])->group(function () {
    // Ruta para el panel de alumno
    Route::get('/lista-usuarios', [
        AuthController::class, 'usuarios'
    ])->name('usuarios');
});

// Verificacion de psicologo
Route::middleware(['psicologo'])->group(function() {
    // Ruta para el panel de psicologo
    Route::get('/psico-dashboard', [
        CitaController::class, 'index'
    ])->name('psico-dashboard');

    Route::post('/guardar-cita', [
        CitaController::class, 'store'
    ])->name('citas.store');

    Route::get('/citas/{cita}/editar', [
        CitaController::class, 'edit'
    ])->name('citas.edit');

    Route::put('/citas/{cita}', [
        CitaController::class, 'update'
    ])->name('citas.update');

    Route::delete('/citas/{cita}', [
        CitaController::class, 'destroy'
    ])->name('citas.destroy');
});

Route::get('/recursos', [
    recursosController::class, 'recursos'
])->name('recursos');

Route::post('/recursos', [
    recursosController::class, 'store'
])->name('recursos.store');

Route::get('/recursos/{recurso}/edit', [
    recursosController::class, 'edit'
])->name('recursos.edit');

Route::put('/recursos/{recurso}', [
    recursosController::class, 'update'
])->name('recursos.update');

Route::delete('/recursos/{recurso}', [
    recursosController::class, 'destroy'
])->name('recursos.destroy');