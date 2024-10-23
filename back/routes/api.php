<?php

use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthenticatorController::class, 'register'])->name('register');
Route::post('/login', [AuthenticatorController::class, 'authenticate'])->name('login');
Route::get('/logout', [AuthenticatorController::class, 'logout'])->name('logout');

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('stripe')->group(function () {
        Route::post('create-setup-intent', [StripeController::class, 'createSetupIntent'])->name('stripe.createSetupIntent');
        Route::post('add-payment-method', [StripeController::class, 'addPaymentMethod'])->name('stripe.addPaymentMethod');
    });


});

Route::post('/categorystore', [CategoriaController::class,'store']);

Route::get('/categorydelete/{id}', [CategoriaController::class,'delete']);

Route::post('/categoryupdate/{id}', [CategoriaController::class,'update']);

Route::get('/categorylist', [CategoriaController::class,'list']);
