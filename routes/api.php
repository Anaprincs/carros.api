<?php

use App\Http\Controllers\CarrosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Post('carro', [CarrosController::class, 'store']);

Route::get('carros', [CarrosController::class, 'index']);

Route::put('update', [CarrosController::class, 'update']);

Route::delete('carros/{id}/delete', [CarrosController::class, 'delete']);

Route::get('carros/{id}/find', [CarrosController::class, 'findById']);
Route::get('carros/search', [CarrosController::class, 'searchByname']);