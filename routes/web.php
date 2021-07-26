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



Route::post('/auth/store', [AuthController::class, 'store'])->name('auth_store');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth_check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth_logout');


Route::group(['middleware'=>['AuthCheck']], function(){
   
   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth_login');
   Route::get('/auth/register', [AuthController::class, 'register'])->name('auth_register');
   // home routes
   Route::get('/', [HomeController::class, 'index'])->name('home_index');
   // books routes 
   Route::get('/books', [BooksController::class, 'index'])->name('books_index');
   Route::get('/books/deadline_renewed', [BooksController::class, 'deadline_renewed'])->name('books_deadline_renew');
   Route::get('/books/fetch_data', [BooksController::class, 'fetch_data']);
   Route::get('/books/view', [BooksController::class, 'books_view']);
   Route::get('/books/likes', [BooksController::class, 'likes']);
   Route::get('/books/comments', [BooksController::class, 'comments']);
   // about routes
   Route::get('/about', [AboutController::class, 'index'])->name('about_index');
   // rating routes
   Route::get('/rating', [RatingController::class, 'index'])->name('rating_index');
   Route::get('/rating/fetch_data', [RatingController::class, 'fetch_data']);
   // presentation routes
   Route::get('/presentation', [PresentationController::class, 'index'])->name('presentation_index');
   // activities routes
   Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities_index');
   // rules routes
   Route::get('/rules', [RulesController::class, 'index'])->name('rules_index');
   // feedback routes
   Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback_index');


});