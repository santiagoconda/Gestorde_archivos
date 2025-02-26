<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\archivosController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/session', [authController::class, 'index'])->name('login');
Route::post('/register', [authController::class, 'registrarUsuarios'])->name('registrar.usuarios');
Route::post('/login', [authController::class, 'login'])->name('login.usuarios');

Route::get('/restablecer/contraseña', [authController::class, 'mostrarFormularioEmail'])->name('password.request');
Route::post('/enviar/correo', [authController::class, 'enviarCorreoResetPassword'])->name('password.email');
Route::get('/restablecer/contraseña/{token}', [authController::class, 'mostrarFormularioReset'])->name('password.reset');
Route::post('/restablecer', [authController::class, 'resetPassword'])->name('password.update');



 