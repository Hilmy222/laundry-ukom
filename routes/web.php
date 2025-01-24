<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [LoginController::class, 'login'])->name('login.admin');
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');