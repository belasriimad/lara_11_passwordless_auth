<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [UserController::class, 'registerForm'])->name('register.form');
    Route::post('store', [UserController::class, 'store'])->name('register.store');
    Route::get('login', [UserController::class, 'loginForm'])->name('login');
    Route::post('login/link', [UserController::class, 'sendLoginLink'])->name('login.link');
    Route::middleware('signed')->get('auth/{email}', [UserController::class, 'auth'])
        ->name('login.auth');
});