<?php

use App\Http\Controllers\ApiProductsController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ArticuloComandaController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ShippingAddresses;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthenticatorController::class, 'register'])->name('register');
Route::post('/login', [AuthenticatorController::class, 'authenticate'])->name('login');
Route::get('/logout', [AuthenticatorController::class, 'logout'])->name('logout');

Route::prefix('home')->group(function () {
    Route::get('get-home-data', [ApiProductsController::class, 'getHome'])->name('home.data');
    Route::get('get-menu-categories', [ApiProductsController::class, 'menuCategories'])->name('home.menuCategories');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('addresses')->group(function () {
        Route::post('create-addresses', [ShippingAddresses::class, 'creatAddresses'])->name('addresses.creatAddresses');

    });
    Route::prefix('stripe')->group(function () {
        Route::post('create-setup-intent', [StripeController::class, 'createSetupIntent'])->name('stripe.createSetupIntent');
        Route::post('add-payment-method', [StripeController::class, 'addPaymentMethod'])->name('stripe.addPaymentMethod');
        Route::post('retrieve-payment-method', [StripeController::class, 'retrievePaymentMethod'])->name('stripe.retrievePaymentMethod');
        Route::post('set-default-payment-method', [StripeController::class, 'setDefaultPaymentMethod'])->name('stripe.setDefaultPaymentMethod');
        Route::post('purchase', [StripeController::class, 'purchase'])->name('stripe.purchase');
    });
});

/*//Route::post('/categorystore', [CategoriaController::class,'store'])->name("category.store");
//
//Route::get('/categorydelete/{id}', [CategoriaController::class,'delete'])->name("category.delete");
//
//Route::post('/categoryupdate/{id}', [CategoriaController::class,'update'])->name("category.update");
//
//Route::get('/categorylist', [CategoriaController::class,'list'])->name("category.list");
//
//
//Route::post('/subcategorystore', [SubCategoriaController::class,'store'])->name('subcategory.store');
//
//Route::get('/subcategorycreate', [SubCategoriaController::class, 'create'])->name('subcategory.create');
//
//Route::delete('/subcategorydelete/{id}', [SubCategoriaController::class, 'delete'])->name('subcategory.delete');
//
//Route::put('/subcategoryupdate/{id}', [SubCategoriaController::class, 'update'])->name('subcategory.update');
//
//Route::get('/subcategorias/edit/{id}', [SubCategoriaController::class, 'edit'])->name('subcategory.edit');
//
//Route::get('/subcategorylist', [SubCategoriaController::class,'list']);
//
//Route::get('/subcategoryindex', [SubCategoriaController::class,'index'])->name('subcategory.index');


//Route::post('/productestore', [ProducteController::class,'store']);
//
//Route::get('/productedelete/{id}', [ProducteController::class,'delete']);
//
//Route::post('/producteupdate/{id}', [ProducteController::class,'update']);

Route::get('/productelist', [ProducteController::class,'list']);


Route::post('/comandastore', [ComandaController::class,'store']);

//Route::get('/comandadelete/{id}', [ComandaController::class,'delete']);

//Route::post('/comandaupdate/{id}', [ComandaController::class,'update']);

Route::get('/comandalist', [ComandaController::class,'list']);


//Route::post('/articulocomandastore', [ArticuloComandaController::class,'store']);
//
//Route::get('/articulocomandadelete/{id}', [ArticuloComandaController::class,'delete']);
//
//Route::post('/articulocomandaupdate/{id}', [ArticuloComandaController::class,'update']);

Route::get('/articulocomandalist', [ArticuloComandaController::class,'list']);


Route::post('/invoicestore', [InvoiceController::class,'store']);

//Route::get('/invoicedelete/{id}', [InvoiceController::class,'delete']);
//
//Route::post('/invoiceupdate/{id}', [InvoiceController::class,'update']);

Route::get('/invoicelist', [InvoiceController::class,'list'])->name("invoice.list");*/


