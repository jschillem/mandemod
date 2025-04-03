<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

// Module routes
Route::controller(ModuleController::class)
    ->prefix('modules')
    ->name('modules.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{module}', 'show')->name('show');
        Route::middleware(['auth'])->group(function () {
            Route::post('/', 'submit')->name('submit');
            Route::get('/{module}/edit', 'edit')->name('edit');
            Route::put('/{module}', 'update')->name('update');
            Route::delete('/{module}', 'destroy')->name('destroy');
        });
    });
