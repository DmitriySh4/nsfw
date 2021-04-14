<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Banner;

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
        View::composer('*', function($view)
        {
            $banners = Banner::all();
            $navCat = Category::all();
            $view->with(['navCat' => $navCat, 'banners' => $banners]);
        });
    }
}
