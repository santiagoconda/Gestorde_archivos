<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\archivosController;


Route::get('/', [authController::class, 'index'])->name('login');
Route::post('/register', [authController::class, 'registrarUsuarios'])->name('registrar.usuarios');
Route::post('/login', [authController::class, 'login'])->name('login.usuarios');

Route::get('/restablecer/contraseña', [authController::class, 'mostrarFormularioEmail'])->name('password.request');
Route::post('/enviar/correo', [authController::class, 'enviarCorreoResetPassword'])->name('password.email');
// Route::get('/actualizar/contraseña/{token}', [authController::class, 'mostrarFormularioReset'])->name('password.reset');
Route::get('/actualizar/contraseña/', [authController::class, 'mostrarFormularioReset'])->name('password.reset');
Route::post('/restablecer', [authController::class, 'resetPassword'])->name('password.update');

Route::get('/subir/archivos', [archivosController::class, 'vistaArchivos'])->name('index');
Route::post('/subir', [archivosController::class, 'guarDardatos'])->name('subir');
Route::get('/dashboard', [archivosController::class, 'verArchivos'])->name('ver.archivos');


