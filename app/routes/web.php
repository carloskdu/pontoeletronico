<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistroPontoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/registrar-ponto', [RegistroPontoController::class, 'index'])->name('ponto.index');
    Route::post('/registrar-ponto', [RegistroPontoController::class, 'registrar'])->name('ponto.registrar');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('funcionarios', FuncionarioController::class)->except(['show']);

    // Tela para o administrador ver pontos com filtro
    Route::get('/registros-ponto', [RegistroPontoController::class, 'indexAdminSemEloquent2'])->name('registros-ponto.indexAdmin');

});
