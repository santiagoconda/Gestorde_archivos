<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [authController::class, 'login'])->name('login');
