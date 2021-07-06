<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/', [HomeController::class, 'index'])->name('home_index');

