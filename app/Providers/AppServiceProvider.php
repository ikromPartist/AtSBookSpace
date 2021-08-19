<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        view()->composer('*', function($view){
            if (session()->has('loggedUser')) {
                $loggedUser = User::withCount('taken_books')
                                    ->withCount('presentations')
                                    ->withCount('participations')
                                    ->withCount('likes')
                                    ->withCount('actions')
                                    ->where('id', session()->get('loggedUser'))->first();
                return $view->with('loggedUser', $loggedUser);
            }
        });
        view()->composer('*', function($view){
            return $view->with('route', \Route::currentRouteName());
        });
    }
}
