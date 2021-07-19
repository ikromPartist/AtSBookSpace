<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\FeedbackController;



Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::group(['middleware'=>['AuthCheck']], function(){

   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
   Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
   
   Route::get('/', [HomeController::class, 'index'])->name('home_index');

   Route::get('/books', [BooksController::class, 'index'])->name('books_index');
   Route::get('/books/fetch_data', [BooksController::class, 'fetch_data']);
   Route::get('/books/view', [BooksController::class, 'books_view']);

   Route::get('/about', [AboutController::class, 'index'])->name('about_index');

   Route::get('/rating', [RatingController::class, 'index'])->name('rating_index');

   Route::get('/presentation', [PresentationController::class, 'index'])->name('presentation_index');

   Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities_index');

   Route::get('/rules', [RulesController::class, 'index'])->name('rules_index');

   Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback_index');


});