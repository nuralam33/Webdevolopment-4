<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        paginator::useBootstrap();

        view()->composer('*',function($view){
            $view->with('categories',Category::with('subcategory')->get());
            $view->with('cartProducts',Cart::where('user_id',auth()->check()?auth()->user()->id: '')->count());
        });

    }
}
