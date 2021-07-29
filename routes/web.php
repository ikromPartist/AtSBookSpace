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
   // home routes
   Route::get('/', [HomeController::class, 'index'])->name('home.index');
   // books routes 
   Route::get('/books', [BooksController::class, 'index'])->name('books.index');
   Route::get('/books/single/{id}', [BooksController::class, 'single'])->name('books.single');
   Route::get('/books/fetch_data', [BooksController::class, 'fetchData']);
   Route::get('/books/view_type', [BooksController::class, 'viewType']);
   Route::get('/books/extend_deadline', [BooksController::class, 'extendDeadline']);
   Route::get('/books/likes', [BooksController::class, 'likes']);
   Route::get('/books/comments', [BooksController::class, 'comments']);
   Route::get('/books/ratings', [BooksController::class, 'ratings']);

   // about routes
   Route::get('/about', [AboutController::class, 'index'])->name('about.index');
   // rating routes
   Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
   Route::get('/rating/fetch_data', [RatingController::class, 'fetchData']);
   // presentation routes
   Route::get('/presentation', [PresentationController::class, 'index'])->name('presentation.index');
   // activities routes
   Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities.index');
   // rules routes
   Route::get('/rules', [RulesController::class, 'index'])->name('rules.index');
   // feedback routes
   Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');

});