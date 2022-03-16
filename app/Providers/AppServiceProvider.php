<?php

namespace App\Providers;

use App\Models\admin\Category;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view){
            $header_category = Category::select('name_bn', 'slug_en')->get();
            $view->with(['header_category'=> $header_category]);
        });
    }
}
