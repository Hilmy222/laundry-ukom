<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [LoginController::class, 'index'])->name('login.admin');
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::prefix('admin/pelanggan')->name('admin.customers.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('edit');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/update', [CustomerController::class, 'update'])->name('update');
});

Route::prefix('Auth/')->name('login.')->controller(LoginController::class)->group( function() {
    Route::get('login','index')->name('show');
    Route::post('login/proses','login_proses')->name('proses');
});

Route::prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
});

Route::prefix('admin/outlets')->name('admin.outlets.')->group(function () {
    Route::get('/index', [OutletController::class, 'index'])->name('index');
    Route::get('/create', [OutletController::class, 'create'])->name('create');
    Route::post('/store', [OutletController::class, 'store'])->name('store');
    Route::delete('/{id}', [OutletController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [OutletController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [OutletController::class, 'update'])->name('update');
});

Route::prefix('admin/packages')->name('admin.packages.')->group(function () {
    Route::get('/index', [PackageController::class, 'index'])->name('index');
    Route::get('/create', [PackageController::class, 'create'])->name('create');
    Route::post('/store', [PackageController::class, 'store'])->name('store');
    Route::delete('/{id}', [PackageController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [PackageController::class, 'update'])->name('update');
});


Route::prefix('admin/transactions')->name('admin.transactions.')->group(function () {
    Route::get('/index', [TransactionController::class, 'index'])->name('index');
    Route::get('/create', [TransactionController::class, 'create'])->name('create');
    Route::post('/store', [TransactionController::class, 'store'])->name('store');
    Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [TransactionController::class, 'update'])->name('update');
});

Route::get('/admin/product/', [PackageController::class, 'index'])->name('admin.packages.index');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('Auth/login');
})->name('logout');
