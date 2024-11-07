<?php

use App\Http\Controllers\ApiProductsController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\DireccionesEnvioController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ArticuloComandaController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DireccionesFacturacionController;
use App\Http\Controllers\ProductOpinionController;

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

Route::get('/get-products', [ApiProductsController::class, 'getProducts'])->name('getProducts');
Route::prefix('product')->group(function () {
    Route::get('/{productId}/opinions', [ProductOpinionController::class, 'getProductOpinions']);
    Route::get('/{productId}/opinions/stats', [ProductOpinionController::class, 'getProductOpinionsStats']);

});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('product')->group(function () {
        Route::post('opinion', [ProductOpinionController::class, 'store']);
    });
    Route::prefix('addresses')->group(function () {
        Route::post('create-addresses', [DireccionesEnvioController::class, 'store'])->name('addresses.creatAddresses');
        Route::post('get-addresses', [DireccionesEnvioController::class, 'getAddresses'])->name('addresses.getAddresses');
        Route::post('delete-address/{id}', [DireccionesEnvioController::class, 'delete'])->name('addresses.delete');
        Route::post('update-address/{id}', [DireccionesEnvioController::class, 'update'])->name('addresses.update');
        Route::post('update-default-address', [DireccionesEnvioController::class, 'updateDefault'])->name('addresses.updateDefault');
    });
    Route::prefix('billing-addresses')->group(function () {
        Route::post('create-addresses-billing', [DireccionesFacturacionController::class, 'store'])->name('addresses.creatAddressesBilling');
        Route::post('get-addresses-billing', [DireccionesFacturacionController::class, 'getAddresses'])->name('addresses.getAddressesBilling');
        Route::post('delete-address-billing/{id}', [DireccionesFacturacionController::class, 'delete'])->name('addresses.deleteBilling');
        Route::post('update-address-billing/{id}', [DireccionesFacturacionController::class, 'update'])->name('addresses.updateBilling');
        Route::post('update-default-address-billing', [DireccionesFacturacionController::class, 'updateDefault'])->name('addresses.updateDefaultBilling');
    });
    Route::prefix('stripe')->group(function () {
        Route::post('create-setup-intent', [StripeController::class, 'createSetupIntent'])->name('stripe.createSetupIntent');
        Route::post('add-payment-method', [StripeController::class, 'addPaymentMethod'])->name('stripe.addPaymentMethod');
        Route::post('retrieve-payment-method', [StripeController::class, 'retrievePaymentMethod'])->name('stripe.retrievePaymentMethod');
        Route::post('set-default-payment-method', [StripeController::class, 'setDefaultPaymentMethod'])->name('stripe.setDefaultPaymentMethod');
        Route::post('purchase', [StripeController::class, 'purchase'])->name('stripe.purchase');
    });

    Route::prefix('orders')->group(function () {
        Route::post('get-my-orders', [ComandaController::class, 'getMyOrders'])->name('orders.getMyOrders');
    });

    Route::get('/test-auth', function () {
        return response()->json(['message' => 'Si ves esto, estás autenticado!', 'user' => auth()->user(), 'user2' => \Illuminate\Support\Facades\Auth::user()]);
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


