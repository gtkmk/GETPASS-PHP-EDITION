<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnotationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\HistoricController;

Route::post('/users/authenticate', [UsersController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('annotations', [AnnotationController::class, 'index']);
    Route::post('annotations', [AnnotationController::class, 'store']);
    Route::get('annotations/{id}', [AnnotationController::class, 'show']);
    Route::put('annotations/{id}', [AnnotationController::class, 'update']);
    Route::delete('annotations/{id}', [AnnotationController::class, 'destroy']);

    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::put('/users/{id}', [UsersController::class, 'update']);
    Route::delete('/users/{id}', [UsersController::class, 'destroy']);

    Route::get('categories', [CategoriesController::class, 'index']);
    Route::post('categories', [CategoriesController::class, 'store']);
    Route::get('categories/{id}', [CategoriesController::class, 'show']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);

    Route::get('credentials', [CredentialController::class, 'index']);
    Route::post('credentials', [CredentialController::class, 'store']);
    Route::get('credentials/{id}', [CredentialController::class, 'show']);
    Route::put('credentials/{id}', [CredentialController::class, 'update']);
    Route::delete('credentials/{id}', [CredentialController::class, 'destroy']);

    Route::get('historics', [HistoricController::class, 'index']);
    Route::post('historics', [HistoricController::class, 'store']);
    Route::get('historics/{id}', [HistoricController::class, 'show']);
    Route::put('historics/{id}', [HistoricController::class, 'update']);
    Route::delete('historics/{id}', [HistoricController::class, 'destroy']);
});

Route::post('auth', [UsersController::class, 'authenticate']);
