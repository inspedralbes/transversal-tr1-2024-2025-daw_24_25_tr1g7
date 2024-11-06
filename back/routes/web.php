<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ArticuloComandaController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\PdfController;



Route::get('/', [AuthenticatorController::class, 'showLoginForm'])->name('home');

Route::get('/welcome', [AuthenticatorController::class, 'showWelcome'])->name('welcome');

Route::post('/logout', [AuthenticatorController::class, 'logout'])->name('logout');

Route::post('/login', [AuthenticatorController::class, 'authenticate'])->name('login');

Route::post('/register', [AuthenticatorController::class, 'register'])->name('register');



Route::get('/categoryindex', [CategoriaController::class,'index'])->name("category.index");

Route::post('/categorystore', [CategoriaController::class,'store'])->name("category.store");

Route::get('/categorydelete/{id}', [CategoriaController::class,'delete'])->name("category.delete");

Route::post('/categoryupdate/{id}', [CategoriaController::class,'update'])->name("category.update");

Route::get('/categorylist', [CategoriaController::class,'list'])->name("category.list");


Route::get('/subcategoryindex', [SubCategoriaController::class,'index'])->name('subcategory.index');

Route::get('/subcategorycreate', [SubCategoriaController::class, 'create'])->name('subcategory.create');

Route::post('/subcategorystore', [SubCategoriaController::class,'store'])->name('subcategory.store');

Route::get('/subcategoryedit/{id}', [SubCategoriaController::class, 'edit'])->name('subcategory.edit');

Route::put('/subcategoryupdate/{id}', [SubCategoriaController::class, 'update'])->name('subcategory.update');

Route::delete('/subcategorydelete/{id}', [SubCategoriaController::class,'delete'])->name('subcategory.delete');


Route::get('/pdf', [PdfController::class, 'index'])->name('pdf.index');



Route::get('/productelist', [ProducteController::class,'index'])->name('producte.index');

Route::post('/productestore', [ProducteController::class,'store'])->name('producte.store');

Route::get('/productedit/{id}', [ProducteController::class,'edit'])->name('producte.edit');

Route::get('/producte/crear', [ProducteController::class, 'crear'])->name('producte.crear');

Route::put('/producteupdate/{id}', [ProducteController::class, 'update'])->name('producte.update');

Route::delete('/productedelete/{id}', [ProducteController::class,'delete'])->name('producte.delete');

//Route::get('/productelist', [ProducteController::class,'list']);


Route::get('/comandasindex', [ComandaController::class,'index'])->name("comanda.index");


Route::post('/comandastore', [ComandaController::class,'store'])->name("comanda.store");

Route::get('/comandadelete/{id}', [ComandaController::class,'delete'])->name("comanda.delete");

Route::get('/comandaedit/{id}', [ComandaController::class, 'edit'])->name('comanda.edit');

Route::put('/comandaupdate/{id}', [ComandaController::class,'update'])->name("comanda.update");

Route::get('/comandalist', [ComandaController::class,'list'])->name("comanda.list");


Route::post('/articulocomandastore', [ArticuloComandaController::class,'store']);

Route::get('/articulocomandadelete/{id}', [ArticuloComandaController::class,'delete']);

Route::post('/articulocomandaupdate/{id}', [ArticuloComandaController::class,'update']);

Route::get('/articulocomandalist', [ArticuloComandaController::class,'list']);


Route::post('/invoicestore', [InvoiceController::class,'store']);

Route::get('/invoicedelete/{id}', [InvoiceController::class,'delete']);

Route::post('/invoiceupdate/{id}', [InvoiceController::class,'update']);

Route::get('/invoicelist', [InvoiceController::class,'list'])->name("invoice.list");


