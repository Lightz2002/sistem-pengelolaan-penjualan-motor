<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'list'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/customers', [SalesController::class, 'indexCustomers'])->name('customers');
    Route::get('/customers/{sales}', [SalesController::class, 'showCustomer'])->name('customers.show');
    Route::get('/customers/{sales}/edit', [SalesController::class, 'editCustomer'])->name('customers.edit');

    Route::get('/customers/createAdminData', [SalesController::class, 'createAdminDataSales'])->name('sales.createAdminDataSales');
    Route::post('/customers/storeAdminData', [SalesController::class, 'storeAdminDataSales'])->name('sales.storeAdminDataSales');

    Route::put('/customers/storeSurveyor/{sales}', [SalesController::class, 'storeSurveyorSales'])->name('sales.storeSurveyorSales');
    Route::put('/customers/rejectSurveyor/{sales}', [SalesController::class, 'rejectSurveyorSales'])->name('sales.rejectSurveyorSales');
});

require __DIR__ . '/auth.php';
