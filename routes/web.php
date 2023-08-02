<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatagoriesController;


Route::redirect('/', 'login');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::controller(CatagoriesController::class)->group(function () {
    Route::get('/catagories', 'index')->name('catagories.index');
    Route::post('/catagories', 'store')->name('catagories.store');
    Route::patch('/catagories/{catagory}', 'update')->name('catagories.update');
});