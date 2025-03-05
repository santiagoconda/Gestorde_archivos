<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\archivosController;


Route::get('/', [authController::class, 'index'])->name('login');
Route::get('/registro/usuarios', [authController::class, 'vistaresgistrar'])->name('ver.usuarios');
Route::post('/register', [authController::class, 'registrarUsuarios'])->name('registrar.usuarios');
Route::post('/login', [authController::class, 'login'])->name('login.usuarios');

Route::get('/restablecer/contraseña', [authController::class, 'mostrarFormularioEmail'])->name('password.request');
Route::post('/enviar/correo', [authController::class, 'enviarCorreoResetPassword'])->name('password.email');
Route::get('/actualizar/contraseña/{token}', [authController::class, 'mostrarFormularioReset'])->name('password.reset');
Route::post('/restablecer', [authController::class, 'resetPassword'])->name('password.update');

Route::get('/subir/archivos', [archivosController::class, 'vistaArchivos'])->name('index');
Route::post('/subir', [archivosController::class, 'guarDardatos'])->name('subir');
Route::get('/editar/archivo/{id}', [archivosController::class, 'edit'])->name('editar.archivos');
Route::put('/actualizar',[archivosController::class,'actualizarDatos'])->name('actualizar.archivos');
Route::delete('/eliminar/archivo/{id}',[archivosController::class,'eliminarArchivo'])->name('eliminar.archivo');

Route::get('/descargar/archivo/{id}', [archivosController::class, 'descargarArchivos'])->name('descargar.archivos');
Route::get('/visualizar/archivo/{id}', [archivosController::class, 'visualizarArchivo'])->name('visualizar.archivos');
 


// TABLAS
Route::get('/ver/archivos/general', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos();
    return view('tablas.tablaGeneral', compact('archivos'));
})->name('tablas.archivos');

//tabla Planeacion
Route::get('/ver/archivos/planeacion', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivosFiltro(1); 
    return view('tablas.planeacion', compact('archivos'));
})->name('planeacion.archivos');



// /tabla administracion
Route::get('/dashboard', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos();
    return view('dashboard.administrador',compact('archivos'));
    })->name('ver.archivos');
//tablausarios
Route::get('/usuarios',function(){
    $usuariosC = new authController();
    $usuarios = $usuariosC->traerUsuarios();
    return view('tablas.usuarios',compact('usuarios'));
})->name('añadir.usuarios');






