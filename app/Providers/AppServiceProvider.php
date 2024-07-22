<?php

namespace App\Providers;
use App\Models\Categories;
use App\Models\Brands;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        view()->composer("*", function ($view) {
            $categories = Categories::all();
            $brands = Brands::all();
            $view->with(compact("categories", "brands"));
        });
    }
}
