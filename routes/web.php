<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('catalog.index');
    Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->name('catalog.show');

    Route::get('/catalog/{id}/edit', [CatalogController::class, 'getEdit'])->name('catalog.edit');
    Route::put('/catalog/{id}', [CatalogController::class, 'putEdit'])->name('catalog.update');

    Route::put('/catalog/{id}/rent', [CatalogController::class, 'rentMovie'])->name('catalog.rent');
    Route::put('/catalog/{id}/return', [CatalogController::class, 'returnMovie'])->name('catalog.return');

    Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('catalog.create.form');
    Route::post('/catalog/create', [CatalogController::class, 'postCreate'])->name('catalog.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
