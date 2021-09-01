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
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;

Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
   Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
   Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
   //! Home routes
   Route::get('/', [HomeController::class, 'index'])->name('home.index');
   //! Book routes 
   Route::get('/books', [BooksController::class, 'index'])->name('books.index');
   Route::get('/books/single/{id}', [BooksController::class, 'single'])->name('books.single');
   Route::get('/books/fetch_data', [BooksController::class, 'fetchData']);
   Route::get('/books/view_type', [BooksController::class, 'viewType']);
   Route::get('/books/extend_deadline', [BooksController::class, 'extendDeadline']);
   Route::get('/books/likes', [BooksController::class, 'likes']);
   Route::get('/books/comments', [BooksController::class, 'comments']);
   Route::get('/books/ratings', [BooksController::class, 'ratings']);
   Route::get('/books/booking', [BooksController::class, 'booking']);
   //! About routes
   Route::get('/about', [AboutController::class, 'index'])->name('about.index');
   //! Rating routes
   Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
   Route::get('/rating/fetch_data', [RatingController::class, 'fetchData']);
   //! Presentation routes
   Route::get('/presentation', [PresentationController::class, 'index'])->name('presentation.index');
   Route::get('/presentation/single/{id}', [PresentationController::class, 'single'])->name('presentation.single');
   Route::post('/presentation/store', [PresentationController::class, 'store']);
   Route::get('/presentation/participation', [PresentationController::class, 'participation']);
   Route::get('/presentation/download/{presentation}', [PresentationController::class, 'download'])->name('presentation.download');
   Route::get('/presentation/acception', [PresentationController::class, 'acception'])->name('presentation.acception');
   //! Activity routes
   Route::get('/activities', [ActivitiesController::class, 'index'])->name('activities.index');
   Route::get('/activities/single/{id}', [ActivitiesController::class, 'single'])->name('activities.single');
   Route::get('/activities/participation', [ActivitiesController::class, 'participation']);
   //! Rules routes
   Route::get('/rules', [RulesController::class, 'index'])->name('rules.index');
   //! Feedback routes
   Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
   Route::get('/feedback/single/{$id}', [FeedbackController::class, 'single'])->name('feedback.single');
   //! Profile routes
   Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
   Route::get('/profile/single/{id}', [ProfileController::class, 'single'])->name('profile.single');
   Route::post('/profile/update_avatar', [ProfileController::class, 'avatarUpdate'])->name('avatar.update');
   Route::post('/profile/update_userinfo', [ProfileController::class, 'userinfoUpdate'])->name('userinfo.update');
   Route::get('/profile/update_password', [ProfileController::class, 'passwordUpdate']);
   Route::get('/profile/fetch_data', [ProfileController::class, 'fetchData']);
   //! Notification routes
   Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications.index');
   Route::get('notifications/single/{notification}', [NotificationsController::class, 'single'])->name('notifications.single');
});
