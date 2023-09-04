<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesInstallmentController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/customers/createAdminData', [SalesController::class, 'createAdminDataSales'])->name('sales.createAdminDataSales');
    Route::put('/customers/storeSurveyor/{sales}', [SalesController::class, 'storeSurveyorSales'])->name('sales.storeSurveyorSales');
    Route::put('/customers/rejectSurveyor/{sales}', [SalesController::class, 'rejectSurveyorSales'])->name('sales.rejectSurveyorSales');
    Route::get('/customers/{sales}', [SalesController::class, 'showCustomer'])->name('customers.show');
    Route::get('/customers/{sales}/edit', [SalesController::class, 'editCustomer'])->name('customers.edit');
    Route::post('/customers/storeAdminData', [SalesController::class, 'storeAdminDataSales'])->name('sales.storeAdminDataSales');
    Route::post('/customers/{sales}/status', [SalesController::class, 'updateStatus'])->name('sales.updateStatus');


    Route::get('/sales', [SalesController::class, 'listCreditSales'])->name('sales.listCreditSales');
    Route::get('/sales/{sales}/showCreditSales', [SalesController::class, 'showCreditSales'])->name('sales.showCreditSales');
    Route::get('/sales/{sales}/editCreditSales', [SalesController::class, 'editCreditSales'])->name('sales.editCreditSales');
    Route::get('/sales/{sales}/print', [SalesController::class, 'print'])->name('sales.print');
    Route::put('/sales/{sales}/updateCreditSales', [SalesController::class, 'updateCreditSales'])->name('sales.updateCreditSales');

    Route::get('/cashsales/create', [SalesController::class, 'createCashSales'])->name('cashsales.create');
    Route::get('/cashsales/{sales}', [SalesController::class, 'showCashSales'])->name('cashsales.show');
    Route::post('/cashsales', [SalesController::class, 'storeCashSales'])->name('cashsales.store');

    Route::get('/salesinstallment', [SalesInstallmentController::class, 'list'])->name('salesinstallment.list');
    Route::get('/salesinstallment/{sales}/create', [SalesInstallmentController::class, 'create'])->name('salesinstallment.create');
    Route::get('/salesinstallment/{salesinstallment}/edit', [SalesInstallmentController::class, 'edit'])->name('salesinstallment.edit');
    Route::post('/salesinstallment/{salesinstallment}/update', [SalesInstallmentController::class, 'update'])->name('salesinstallment.update');
    Route::post('/salesinstallment/{sales}', [SalesInstallmentController::class, 'store'])->name('salesinstallment.store');
});

Route::redirect('/', '/login');


require __DIR__ . '/auth.php';

