<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatagoriesController;


Route::redirect('/', 'login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::controller(CatagoriesController::class)->group(function () {
    Route::get('/categories', 'index')
        ->name('catagories.index')
        ->middleware('auth');
    Route::get('/categories/create', 'create')
        ->name('catagories.create')
        ->middleware('auth');
    Route::get('/categories/{category}', 'show')->name('catagories.show')->middleware('auth');
    Route::post('/categories', 'store')
        ->name('catagories.store')
        ->middleware('auth');
    Route::get('/categories/{category}/edit', 'edit')
        ->name('catagories.edit')
        ->middleware('auth');
    Route::put('/categories/{category}', 'update')
        ->name('catagories.update')
        ->middleware('auth');
    Route::delete('/categories/{category}', 'destroy')
        ->name('catagories.destroy')
        ->middleware('auth');
});
