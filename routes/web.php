<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');
    route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
