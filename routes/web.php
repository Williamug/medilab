<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\TestServicesController;

Route::redirect('/', 'login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(CatagoriesController::class)->group(function () {
        Route::get('/categories', 'index')
            ->name('catagories.index');
        Route::get('/categories/create', 'create')
            ->name('catagories.create');
        Route::get('/categories/{category}', 'show')
            ->name('catagories.show');
        Route::post('/categories', 'store')
            ->name('catagories.store');
        Route::get('/categories/{category}/edit', 'edit')
            ->name('catagories.edit');
        Route::put('/categories/{category}', 'update')
            ->name('catagories.update');
        Route::delete('/categories/{category}', 'destroy')
            ->name('catagories.destroy');
    });

    Route::resources([
        'patients' => PatientsController::class,
        'test-services' => TestServicesController::class
    ]);
});
