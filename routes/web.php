<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/login', function(){
    return view('login');
});

Route::get('/logout', function(){
    return 'User logout';
});

Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('index');

Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('/catalog/create', [CatalogController::class, 'getCreate']);

Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->name('edit');

