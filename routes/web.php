<?php

use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AssignRolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\GivePermissionsToRoleController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SampleResultsCotroller;
use App\Http\Controllers\SpacemensController;
use App\Http\Controllers\SubmitTestRequestsController;
use App\Http\Controllers\TestServicesController;

Route::redirect('/', 'login');

// admin signup
Route::get('/restricted-admin-signup', [AdminSignUpController::class, 'create'])->name('admin-signup.create');
Route::post('/restricted-admin-signup', [AdminSignUpController::class, 'store'])->name('admin-singup.store');

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

    // resource controller [index, create, store, show, edit, update, delete]
    Route::resources([
        'patients' => PatientsController::class,
        'test-services' => TestServicesController::class,
        'spacemens' => SpacemensController::class,
        'results' => ResultsController::class,
        'requests' => SubmitTestRequestsController::class,
        'sample-results' => SampleResultsCotroller::class,
    ]);

    // roles & permissions
    // give permissions
    Route::controller(GivePermissionsToRoleController::class)->group(function () {
        Route::get('/roles/give-permissions', 'create')->name('roles.give-permissions');
        Route::post('/roles/give-permissions', 'store')->name('roles.store-permissions');
        Route::get('/roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('/roles/{role}', 'update')->name('roles.update-permissions');
    });

    // roles
    Route::controller(RolesController::class)->group(function () {
        Route::get('/roles',  'index')->name('roles.index');
        Route::get('/roles/create',  'create')->name('roles.create');
        Route::post('/roles',  'store')->name('roles.store');
        Route::get('/roles/{role}',  'show')->name('roles.show');
    });

    // permissions
    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');

    // assign role to user
    Route::controller(AssignRolesController::class)->group(function () {
        Route::get('/assign-roles', 'index')->name('assign-roles.index');
        Route::get('/assign-roles/create', 'create')->name('assign-roles.create');
        Route::post('/assign-roles', 'store')->name('assign-roles.store');
        Route::get('/assign-roles/{user}', 'show')->name('assing-roles.show');
        Route::get('/assign-roles/{user}/edit', 'edit')->name('assing-roles.edit');
        Route::put('/assign-roles/{user}', 'update')->name('assign-roles.update');
    });
});
