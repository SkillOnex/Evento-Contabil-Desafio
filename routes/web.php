<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventoController;


//Rotas Comuns
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

// Rota protegida
Route::middleware(['auth:web'])->group(function () {
    Route::get('/', function () {
        return redirect('/evento');
    });

    Route::get('/evento', [EventoController::class, 'index'])->name('evento');
    Route::post('/evento/alocar', [EventoController::class, 'storeAlocacoes'])->name('evento.alocar');
    Route::post('/evento/salas', [EventoController::class, 'storeSala'])->name('evento.storeSala');
    Route::post('/evento/cafes', [EventoController::class, 'storeCafe'])->name('evento.storeCafe');
});
