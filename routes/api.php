<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnotationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\HistoricController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    $user = Auth::user();
    return response()->json($user);
});

Route::post('/users', [UsersController::class, 'store']);

Route::get('/users', [UsersController::class, 'index']);

Route::post('/login', function(Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $token = $user->createToken('JWT');

        // Autenticação bem-sucedida, retornar o token de acesso como resposta
        return response()->json(['access_token' => $token->plainTextToken]);
    }

    // Autenticação falhou, retornar uma resposta de erro
    return response()->json(['message' => 'Usuário inválido'], 401);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/annotations', [AnnotationController::class, 'index']);
    Route::post('/annotations', [AnnotationController::class, 'store']);
    Route::get('/annotations/{id}', [AnnotationController::class, 'show']);
    Route::put('/annotations/{id}', [AnnotationController::class, 'update']);
    Route::delete('/annotations/{id}', [AnnotationController::class, 'destroy']);

    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::put('/users/{id}', [UsersController::class, 'update']);
    Route::delete('/users/{id}', [UsersController::class, 'destroy']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    Route::get('/categories/{id}', [CategoriesController::class, 'show']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

    Route::get('/credentials', [CredentialsController::class, 'index']);
    Route::post('/credentials', [CredentialsController::class, 'store']);
    Route::get('/credentials/{id}', [CredentialsController::class, 'show']);
    Route::put('/credentials/{id}', [CredentialsController::class, 'update']);
    Route::delete('/credentials/{id}', [CredentialsController::class, 'destroy']);

    Route::get('/historic', [HistoricController::class, 'index']);
    Route::post('/historic', [HistoricController::class, 'store']);
    Route::get('/historic/{id}', [HistoricController::class, 'show']);
    Route::put('/historic/{id}', [HistoricController::class, 'update']);
    Route::delete('/historic/{id}', [HistoricController::class, 'destroy']);
});

Route::post('auth', [UsersController::class, 'authenticate']);
