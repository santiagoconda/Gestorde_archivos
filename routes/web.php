<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\archivosController;


Route::get('/', [authController::class, 'index'])->name('login');
Route::post('/register', [authController::class, 'registrarUsuarios'])->name('registrar.usuarios');
Route::post('/login', [authController::class, 'login'])->name('login.usuarios');
Route::get('/registro/usuarios', [authController::class, 'vistaresgistrar'])->name('ver.usuarios');

Route::get('/restablecer/contraseña', [authController::class, 'mostrarFormularioEmail'])->name('password.request');
Route::post('/enviar/correo', [authController::class, 'enviarCorreoResetPassword'])->name('password.email');
Route::get('/actualizar/contraseña/{token}', [authController::class, 'mostrarFormularioReset'])->name('password.reset');
Route::post('/restablecer', [authController::class, 'resetPassword'])->name('password.update');

Route::get('/subir/archivos', [archivosController::class, 'vistaArchivos'])->name('index');
Route::post('/subir', [archivosController::class, 'guarDardatos'])->name('subir');

Route::get('/descargar/archivo/{id}', [archivosController::class, 'descargarArchivos'])->name('descargar.archivos');
Route::get('/visualizar/archivo/{id}', [archivosController::class, 'visualizarArchivo'])->name('visualizar.archivos');
Route::delete('/eliminar/archivo/{id}',[archivosController::class,'eliminarArchivo'])->name('eliminar.archivo');
Route::get('/editar/archivo/{id}', [archivosController::class, 'edit'])->name('editar.archivos');
Route::put('/actualizar',[archivosController::class,'actualizarDatos'])->name('actualizar.archivos');

Route::get('/ver/archivos', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos();
    return view('tablas.tablaGeneral', compact('archivos'));
})->name('tablas.archivos');

Route::get('/dashboard', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos();
    return view('dashboard.administrador',compact('archivos'));
    })->name('ver.archivos');






