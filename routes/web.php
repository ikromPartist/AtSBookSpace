<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::group(['middleware'=>['AuthCheck']], function(){

   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
   Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
   
   Route::get('/', [HomeController::class, 'index'])->name('home_index');

   Route::get('/books', [BooksController::class, 'index'])->name('books.index');


});