<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ArticuloComandaController;
use App\Http\Controllers\InvoiceController;


Route::get('/categoryindex', [CategoriaController::class,'index'])->name("category.index");


Route::post('/categorystore', [CategoriaController::class,'store'])->name("category.store");

Route::get('/categorydelete/{id}', [CategoriaController::class,'delete'])->name("category.delete");

Route::post('/categoryupdate/{id}', [CategoriaController::class,'update'])->name("category.update");

Route::get('/categorylist', [CategoriaController::class,'list'])->name("category.list");


Route::post('/subcategorystore', [SubCategoriaController::class,'store']);

Route::get('/subcategorydelete/{id}', [SubCategoriaController::class,'delete']);

Route::post('/subcategoryupdate/{id}', [SubCategoriaController::class,'update']);

Route::get('/subcategorylist', [SubCategoriaController::class,'list']);


Route::post('/productestore', [ProducteController::class,'store']);

Route::get('/productedelete/{id}', [ProducteController::class,'delete']);

Route::post('/producteupdate/{id}', [ProducteController::class,'update']);

Route::get('/productelist', [ProducteController::class,'list']);


Route::post('/comandastore', [ComandaController::class,'store']);

Route::get('/comandadelete/{id}', [ComandaController::class,'delete']);

Route::post('/comandaupdate/{id}', [ComandaController::class,'update']);

Route::get('/comandalist', [ComandaController::class,'list']);


Route::post('/articulocomandastore', [ArticuloComandaController::class,'store']);

Route::get('/articulocomandadelete/{id}', [ArticuloComandaController::class,'delete']);

Route::post('/articulocomandaupdate/{id}', [ArticuloComandaController::class,'update']);

Route::get('/articulocomandalist', [ArticuloComandaController::class,'list']);


Route::post('/invoicestore', [InvoiceController::class,'store']);

Route::get('/invoicedelete/{id}', [InvoiceController::class,'delete']);

Route::post('/invoiceupdate/{id}', [InvoiceController::class,'update']);

Route::get('/invoicelist', [InvoiceController::class,'list'])->name("invoice.list");


