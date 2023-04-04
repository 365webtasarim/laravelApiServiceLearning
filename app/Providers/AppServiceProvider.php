<?php

namespace App\Providers;

use App\Models\MenuShort;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
//        //
//        $settingMenu = MenuShort::with('menuler','child')->where('children',0)->get();
//
//        View::share('setting', $settingMenu);
    }
}
