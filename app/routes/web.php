<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistroPontoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    if (Auth::check()) {
       $user = Auth::user();

        if ($user->cargo === 'administrador') {
            return redirect()->route('funcionarios.index'); // ou a rota da área do admin
        }

        if ($user->cargo === 'funcionario') {
            return redirect()->route('registrar-ponto'); // rota de registrar ponto
        }
    }

    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/registrar-ponto', [RegistroPontoController::class, 'index'])->name('ponto.index');
    Route::post('/registrar-ponto', [RegistroPontoController::class, 'registrar'])->name('ponto.registrar');

    Route::resource('funcionarios', FuncionarioController::class)->except(['show']);

    // Tela para o administrador ver pontos com filtro
    Route::get('/registros-ponto', [RegistroPontoController::class, 'indexAdminSemEloquent2'])->name('registros-ponto.indexAdmin');

});
