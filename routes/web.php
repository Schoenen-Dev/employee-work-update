<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkUpdateController;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [WorkUpdateController::class, 'dashboard'])->name('dashboard');
    Route::post('/work-update', [WorkUpdateController::class, 'store'])->name('work.store');
    Route::get('/work-update/{id}/edit', [WorkUpdateController::class, 'edit'])->name('work.edit');
    Route::put('/work-update/{id}', [WorkUpdateController::class, 'update'])->name('work.update');
    Route::delete('/work-update/{id}', [WorkUpdateController::class, 'destroy'])->name('work.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});