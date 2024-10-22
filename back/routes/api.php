<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/categorystore', [CategoriaController::class,'store']);

Route::get('/categorydelete/{id}', [CategoriaController::class,'delete']);

Route::post('/categoryupdate/{id}', [CategoriaController::class,'update']);

Route::get('/categorylist', [CategoriaController::class,'list']);
