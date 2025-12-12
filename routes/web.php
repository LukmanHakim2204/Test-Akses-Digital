<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    // User
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    // Task
    Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
    Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
    Route::get('/task/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.destroy');
    // Customer
    Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');
    // Project
    route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');

    // Order
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');

    //Finance
    Route::get('/finances', [App\Http\Controllers\FinanceController::class, 'index'])->name('finances.index');
    Route::get('/finances/create', [App\Http\Controllers\FinanceController::class, 'create'])->name('finances.create');
    Route::post('/finances', [App\Http\Controllers\FinanceController::class, 'store'])->name('finances.store');
    Route::get('/finances/{id}/edit', [App\Http\Controllers\FinanceController::class, 'edit'])->name('finances.edit');
    Route::put('/finances/{id}', [App\Http\Controllers\FinanceController::class, 'update'])->name('finances.update');
    Route::delete('/finances/{id}', [App\Http\Controllers\FinanceController::class, 'destroy'])->name('finances.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
