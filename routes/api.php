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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pessoas', PessoaParticipanteController::class);
    Route::apiResource('salas', SalaTreinamentoController::class);
    Route::apiResource('cafes', EspacoCafeController::class);
    Route::apiResource('alocacoes', AlocacaoEtapaEventoController::class);
});

Route::post('/login', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Cria token com nome 'api-token'
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->post('/logout', function(Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
});
