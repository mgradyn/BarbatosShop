<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Blade;

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
        Schema::defaultStringLength(191);

        Blade::if('isAdmin', function () {
            return Auth::check() && Auth::user()->role_as == '1';
        });

        view()->composer(
            'layouts.app', 
            function ($view) {
                $view->with('category_list', Category::all());
            }
        );

        Paginator::useBootstrap();
    }
}
