<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function($view){
            if (session()->has('LoggedUser')) {
                $user = User::where('id', session()->has('LoggedUser'))->first();
                return $view->with('user', $user);
            }
        });
        view()->composer('*', function($view){
            return $view->with('route', \Route::currentRouteName());
        });
    }
}
