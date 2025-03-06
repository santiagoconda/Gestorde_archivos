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
Route::get('/permisos/editar/archivo/{id}', [archivosController::class, 'editarconPermisos'])->name('permisos.editar');
Route::put('/actualizar',[archivosController::class,'actualizarDatos'])->name('actualizar.archivos');
Route::delete('/eliminar/archivo/{id}',[archivosController::class,'eliminarArchivo'])->name('eliminar.archivo');

Route::get('/descargar/archivo/{id}', [archivosController::class, 'descargarArchivos'])->name('descargar.archivos');
Route::get('/visualizar/archivo/{id}', [archivosController::class, 'visualizarArchivo'])->name('visualizar.archivos');


//ruta para crear area
Route::post('/crear/area',[archivosController::class,'crearAreas'])->name('crear.area');

Route::post('/crear/rol',[authController::class,'crearRoles'])->name('crear.rol');


// TABLAS
Route::get('/ver/archivos/general', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos();
    return view('tablas.tablaGeneral', compact('archivos'));
})->name('tablas.archivos');

//tabla Planeacion
Route::get('/ver/archivos/planeacion', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos(); 
    return view('tablas.planeacion', compact('archivos'));
})->name('planeacion.archivos');

//tabla Calidad
Route::get('/ver/archivos/calidad', function () {
    $archivosC = new archivosController();
    $archivos = $archivosC->verArchivos(); 
    return view('tablas.calidad', compact('archivos'));
})->name('calidad.archivos');



// /tabla administracion
Route::get('/dashboard', function () {
    $archivosC = new archivosController();

    
    $archivos = $archivosC->verArchivos();
    return view('dashboard.administrador',compact('archivos'));
    })->name('ver.archivos');

// /tabla docentes
Route::get('/ver/archivos/docentes', function () {
    $archivosC = new archivosController();

    
    $archivos = $archivosC->verArchivosAreas();
    return view('tablas.docente',compact('archivos'));
    })->name('docente.archivos');

//tablausarios
Route::get('/usuarios',function(){
    $usuariosC = new authController();
    $usuarios = $usuariosC->traerUsuarios();
    return view('tablas.usuarios',compact('usuarios'));
})->name('añadir.usuarios');



route::get('/areas', function(){
    return view('dashboard.areas');
})->name('areas.crear');

route::get('/roles', function(){
    return view('dashboard.creacionRoles');
})->name('crear.roles');

route::get('/alert', function(){
    return view('welcome');
})->name('welcome.alert');
