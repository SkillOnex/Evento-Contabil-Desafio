<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\PessoaParticipanteController;
use App\Http\Controllers\Api\SalaTreinamentoController;
use App\Http\Controllers\Api\EspacoCafeController;
use App\Http\Controllers\Api\AlocacaoEtapaEventoController;
use App\Http\Controllers\Api\AuthController;


//Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pessoas', PessoaParticipanteController::class);
    Route::apiResource('salas', SalaTreinamentoController::class);
    Route::apiResource('cafes', EspacoCafeController::class);
    Route::apiResource('alocacoes', AlocacaoEtapaEventoController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

});

//Rotas comuns
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
