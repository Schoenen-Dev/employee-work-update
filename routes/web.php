<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::redirect('/', '/login');

Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');

Route::get('/employee/dashboard',[EmployeeDashboardController::class,'index'])->name('employee.dashboard');